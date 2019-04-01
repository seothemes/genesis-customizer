<div class="wrap">
	<h1 class="wp-heading-inline"><?php esc_html_e( 'Generate Child Theme', 'generate-child-theme' ); ?></h1>
	<p><?php esc_html_e( 'Create a Genesis child theme effortlessly using the form below.', 'generate-child-theme' ); ?></p>
	<form action="admin-post.php" method="post" id="create_child_form">
		<input type="hidden" name="action" value="create"/>
		<table class="form-table">
			<tr class="screen-reader-text">
				<th>
					<?php esc_html_e( 'Select Parent Theme:', 'generate-child-theme' ); ?>
				</th>
				<td>
					<select name="parent_template">
						<option value="genesis:Genesis">Genesis</option>
					</select>
				</td>
			</tr>
			<tr>
				<th>
					<?php esc_html_e( 'Name:', 'generate-child-theme' ); ?>
				</th>
				<td>
					<input type="text" name="child_theme_name"
					       class="widefat" required
					       placeholder="<?php esc_html_e( 'Your child theme\'s name' ); ?>"/>
				</td>
			</tr>
			<tr>
				<th>
					<?php esc_html_e( 'Description:', 'generate-child-theme' ); ?>
				</th>
				<td>
                    <textarea name="child_theme_description"
                              class="widefat"
                              placeholder="<?php esc_html_e( 'A brief description of your child theme' ); ?>"></textarea>
				</td>
			</tr>
			<tr>
				<th>
					<?php esc_html_e( 'Author:', 'generate-child-theme' ); ?>
				</th>
				<td>
					<input type="text" name="child_theme_author"
					       class="widefat"
					       placeholder="<?php esc_html_e( 'Author\'s name' ); ?>"/>
				</td>
			</tr>
			<tr>
				<th>
					<?php esc_html_e( 'Version:', 'genesis-customizer' ); ?>
				</th>
				<td>
					<input type="text" name="child_theme_version"
					       class="widefat" placeholder="1.0.0" value="1.0.0"/>
				</td>
			</tr>
            <!--
            <tr>
                <th>
					<?php // esc_html_e( 'Screenshot:', 'genesis-customizer' ); ?>
                </th>
                <td>
                    <input type="file" id="child_theme_screenshot" name="child_theme_screenshot"/>
                </td>
            </tr>
            -->
			<tr>
				<th>
					<input type="submit"
					       class="button button-primary"
					       value="<?php esc_attr_e( 'Generate', 'genesis-customizer' ); ?>"/>
				</th>
			</tr>
		</table>
	</form>
</div>
