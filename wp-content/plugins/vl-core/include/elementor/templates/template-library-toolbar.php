<script type="text/template" id="vlcore-liteTemplateLibrary_template">
	<div class="liteTemplateLibrary_template-body" id="liteTemplate-{{ template_id }}">
		<div class="liteTemplateLibrary_template-preview">
			<i class="eicon-zoom-in-bold" aria-hidden="true"></i>
		</div>
		<img class="liteTemplateLibrary_template-thumbnail" src="{{ thumbnail }}">
		<# if ( obj.isPro ) { #>
		<span class="liteTemplateLibrary_template-badge"><?php esc_html_e( 'Pro', 'vlcore' ); ?></span>
		<# } #>
		<div class="liteTemplateLibrary_template-name">{{{ title }}}</div>
	</div>
	<div class="liteTemplateLibrary_template-footer">
		{{{ vlcore.library.getModal().getTemplateActionButton( obj ) }}}

	</div>
</script>