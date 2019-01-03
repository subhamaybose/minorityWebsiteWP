/**
 * BLOCK: extend image block
 */
const { __ } = wp.i18n,
	{ createHigherOrderComponent } = wp.compose,
	{ Fragment } = wp.element,
	{ InspectorControls } = wp.editor,
	{ PanelBody } = wp.components;

/**
 * Transform bytes to human readable format.
 *
 * @param {int} bytes
 * @returns {string}
 */
function humanFileSize( bytes ) {
	const thresh = 1024,
		units  = ['kB','MB','GB','TB'];

	if ( Math.abs( bytes ) < thresh ) {
		return bytes + ' B';
	}

	let u = -1;
	do {
		bytes /= thresh;
		++u;
	} while ( Math.abs( bytes ) >= thresh && u < units.length - 1 );

	return bytes.toFixed( 1 ) + ' ' + units[u];
}

/**
 * Generate Smush stats table.
 *
 * @param {int}    id
 * @param {object} stats
 * @returns {*}
 */
export function smushStats( id, stats ) {
	if ( 'undefined' === typeof stats ) {
		return smush_vars.strings.gb.select_image;
	} else if ( 'string' === typeof stats ) {
		return stats;
	}

	return (
		<div id="smush-stats" className="sui-smush-media smush-stats-wrapper hidden" style={ { display: 'block' } }>
			<table className="wp-smush-stats-holder">
				<thead>
				<tr>
					<th className="smush-stats-header">{ smush_vars.strings.gb.size }</th>
					<th className="smush-stats-header">{ smush_vars.strings.gb.savings }</th>
				</tr>
				</thead>
				<tbody>
				{ Object.keys( stats.sizes ).map( ( item, i ) => (
					<tr key={ i }>
						<td>{ item.toUpperCase() }</td>
						<td>{ humanFileSize( stats.sizes[item].bytes ) } ( { stats.sizes[item].percent }% )</td>
					</tr>)
				) }
				</tbody>
			</table>
		</div>
	);
}

/**
 * Fetch image data. If image is Smushing, update in 3 seconds.
 *
 * @todo this could be optimized not to query so much.
 */
export function fetchProps( props ) {
	let image = new wp.api.models.Media( { id: props.attributes.id } ),
		smushData = props.attributes.smush;

	image.fetch( { attribute: 'smush' } ).done( function ( img ) {
		if ( 'string' === typeof img.smush ) {
			props.setAttributes( { smush: img.smush } );
			setTimeout( () => fetch( props ), 3000 );
		} else if ( 'undefined' !== typeof img.smush && (
			'undefined' === typeof smushData || JSON.stringify( smushData ) !== JSON.stringify( img.smush )
		) ) {
			props.setAttributes( { smush: img.smush } );
		}
	});
}

/**
 * Modify the blocks edit component.
 * Receives the original block BlockEdit component and returns a new wrapped component.
 */
const smushStatsControl = createHigherOrderComponent( ( BlockEdit ) => {
	return ( props ) => {
		// If not image block or not selected, return unmodified block.
		if ( 'core/image' !== props.name || ! props.isSelected || 'undefined' === typeof props.attributes.id ) {
			return (
				<Fragment>
					<BlockEdit { ...props } />
				</Fragment>
			);
		}

		let smushData = props.attributes.smush;
		fetchProps(props);

		return (
			<Fragment>
				<BlockEdit { ...props } />
				<InspectorControls>
					<PanelBody title={ smush_vars.strings.gb.stats }>
						{ smushStats( props.attributes.id, smushData ) }
					</PanelBody>
				</InspectorControls>
			</Fragment>
		);
	};
}, "withInspectorControl" );

wp.hooks.addFilter( 'editor.BlockEdit', 'wp-smush/smush-data-control', smushStatsControl );