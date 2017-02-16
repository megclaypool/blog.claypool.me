<?php
// Class to create a custom layout control for CSS editors
class CSS_Highlighter_Custom_Control extends WP_Customize_Control {
	  // Render the content on the theme customizer page
		public function enqueue() {
			wp_enqueue_script( 'advanced_css_editor_codemirror_js', plugin_dir_url( __FILE__ ) . 'js/codemirror.js', array( 'jquery'), '', true );
			wp_enqueue_script( 'advanced_css_editor_css_js', plugin_dir_url( __FILE__ ) . 'js/css.js', array( 'advanced_css_editor_codemirror_js'), '', true );
			wp_enqueue_script( 'advanced_css_editor_custom_js', plugin_dir_url( __FILE__ ) . 'js/code-control.js', array( 'advanced_css_editor_codemirror_js'), '', true );
			wp_enqueue_style( 'advanced_css_editor_codemirror_css', plugin_dir_url( __FILE__ ) . 'css/codemirror.css', NULL, NULL, 'all' );
		}

		protected function render() {?>
			<li class="advanced-code-control" id="render_<?php echo $this->id; ?>">
				<?php $this->render_content(); ?>
			</li>
		<?php }

		public function render_content()  {
			?>
				<label>
					<?php if ( ! empty( $this->label ) ) : ?>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
					<?php endif; ?>
					<?php if ( ! empty( $this->description ) ) : ?>
						<span class="description customize-control-description"><?php echo $this->description; ?></span>
					<?php endif; ?>
					<textarea id="<?php echo $this->id; ?>" rows="5" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
				</label>

			<?php
		}
}
?>