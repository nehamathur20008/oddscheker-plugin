// editor.js
( function( blocks, element, blockEditor ) {
    var el = element.createElement;
    var InnerBlocks = blockEditor.InnerBlocks;

    blocks.registerBlockType( 'odds-comparison/block', {
        title: 'Odds Comparison Block',
        icon: 'chart-bar',
        category: 'widgets',
        edit: function( props ) {
            return el(
                'div',
                { className: props.className },
                el( 'h3', {}, 'Select Bookmakers to Compare Odds' ),
                el( InnerBlocks, {
                    allowedBlocks: ['core/paragraph', 'core/image'] // Adjust as per your design
                })
            );
        },
        save: function() {
            return el( InnerBlocks.Content );
        }
    } );
} )(
    window.wp.blocks,
    window.wp.element,
    window.wp.blockEditor
);
