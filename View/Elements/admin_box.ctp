<div id="featured-media" style="text-align: center;">
<?php

	if (!empty($this->data['FeaturedImage']['path'])) {
		echo $this->Html->image($this->data['FeaturedImage']['path'], array('class'=>'img-polaroid', 'width'=>'150'));
	}

?>
	<div class="clear"></div>
</div>
<?php
	echo $this->Form->input('FeaturedImage.node_id', array('type'=>'hidden', 'value'=>$this->data['Node']['id']));
	echo $this->Browser->input('FeaturedImage.path', array(
		'label' => 'Image Path',
		'value' => $this->data['FeaturedImage']['path']
	));
?>