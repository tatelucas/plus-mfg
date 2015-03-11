<?php

class PeThemeSmartMVPTemplate extends PeThemeTemplate  {

	public function __construct(&$master) {
		parent::__construct($master);
	}

	public function paginate_links($loop) {
		if (!$loop) return "";
		
		$classes = "row-fluid post-pagination";
		$all = "";

		if (apply_filters('pe_theme_pager_load_more',false)) {
			$classes .= ' pe-load-more';
			$all = empty($loop->main->all) ? false : $loop->main->all;
			$all = $all ? sprintf('data-all="%s"',esc_attr(json_encode($all))) : "";
		}
?>

	<div class="pager-container text-center">
		<ul class="pagination">
			<li class="<?php echo esc_attr( $loop->main->prev->class ); ?>">
				<a href="<?php echo ( empty( $loop->main->prev->link ) ) ? '#' : esc_url( $loop->main->prev->link ); ?>">&laquo;</a>
			</li>
			<?php while ($page =& $loop->next()): ?>
			<li class="<?php echo esc_attr( $page->class ); ?> pe-is-page">
				<a href="<?php echo esc_url( $page->link ); ?>"><?php echo $page->num; ?></a>
			</li>
			<?php endwhile; ?>
			<li class="<?php echo esc_attr( $loop->main->next->class ); ?>">
				<a href="<?php echo ( empty( $loop->main->next->link ) ) ? '#' : esc_url( $loop->main->next->link ); ?>">&raquo;</a>
			</li>
		</ul>
	</div>

<?php
	}


}

?>