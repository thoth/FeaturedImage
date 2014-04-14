<?php



/**
 * Helper
 *
 * This plugin's Example helper will be loaded via NodesController.
 */
Croogo::hookHelper('Nodes', 'FeaturedImage.FeaturedImage');

Croogo::hookBehavior('Node', 'FeaturedImage.FeaturedImage', array());
Croogo::hookModelProperty('Node', 'hasOne', array('FeaturedImage'));

/**
 * Admin tab
 *
 * When adding/editing Content (Nodes),
 * an extra tab with title 'Example' will be shown with markup generated from the plugin's admin_tab_node element.
 *
 * Useful for adding form extra form fields if necessary.
 */
Croogo::hookAdminBox('Nodes/admin_add', 'Featured Image', 'featured_image.admin_box');
Croogo::hookAdminBox('Nodes/admin_edit', 'Featured Image', 'featured_image.admin_box');
