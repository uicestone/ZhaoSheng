<?php
class recent_posts_in_cat_widget extends WP_Widget {
	//Register widget with WordPress.
	public function __construct() {
		parent::__construct(
	 		'recent_posts_in_cat_widget', // Base ID
			'按分类最新文章', // Name
			array( 'description' => '带分类过滤功能的最新文章', ) // Args
		);
	}
	public function widget( $args, $instance ) {
		extract( $args );
		$title = apply_filters( 'widget_title', $instance['title'] );
		$post_num = apply_filters( 'widget_title', $instance['post_num'] );
		$catID = apply_filters( 'widget_title', $instance['catID'] );

		echo $before_widget;

		if ( ! empty( $title ) )
			echo $before_title . $title . $after_title; ?>

		<ul>
			<?php
			global $post;
			$tmp_post = $post;
			$recent_posts = get_posts('orderby=ASC&numberposts='.$post_num.'&category='.$catID);
			foreach( $recent_posts as $post ) { setup_postdata($post); ?>
				<li><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></li>
			<?php } $post = $tmp_post; setup_postdata($post); ?>
		</ul>

		<?php
		echo $after_widget;
	}

	public function update( $new_instance, $old_instance ) {
		$instance = array();
		$instance['title'] = strip_tags( $new_instance['title'] );
		$instance['post_num'] = strip_tags( $new_instance['post_num'] );
		$instance['catID'] = strip_tags( $new_instance['catID'] );
		return $instance;
	}

	public function form( $instance ) {
		if ( isset( $instance[ 'title' ] ) ) {
			$title = $instance[ 'title' ];
		}
		else {
			$title = 'Recent Posts';
		}
		if ( isset( $instance[ 'post_num' ] ) ) {
			$post_num = $instance[ 'post_num' ];
		}
		else {
			$post_num = 5;
		}
		if ( isset( $instance[ 'catID' ] ) ) {
			$catID = $instance[ 'catID' ];
		}
		else {
			$catID = '';
		}
		?>
		<p>
			<label for="<?php echo $this->get_field_id( 'title' ); ?>">标题:</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
			<label for="<?php echo $this->get_field_id( 'post_num' ); ?>">显示数量:</label> 
			<input class="widefat" id="<?php echo $this->get_field_id( 'post_num' ); ?>" name="<?php echo $this->get_field_name( 'post_num' ); ?>" type="text" value="<?php echo esc_attr( $post_num ); ?>" />
			<label for="<?php echo $this->get_field_id( 'slug' ); ?>">选择分类:</label> 
			<?php
			wp_dropdown_categories(array(
				'name' => $this->get_field_name( 'catID' ),
				'hide_empty' => 0,
				'orderby' => 'name',
				'show_count' => 1,
				'selected' => esc_attr( $catID ),
				'hierarchical' => true,
				'show_option_none' =>'全部分类',
				'echo' => 1
				));
				?>
		</p>
		<?php 
	}
}
add_action( 'widgets_init', create_function( '', 'register_widget( "recent_posts_in_cat_widget" );' ) );
?>