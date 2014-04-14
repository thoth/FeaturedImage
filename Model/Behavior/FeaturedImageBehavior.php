<?php
/**
 * FeaturedImage Behavior
 *
 * PHP version 5
 *
 * @category Behavior
 * @package  Croogo
 * @version  1.0
 * @author   Thomas Rader <tom.rader@claritymediasolutions.com>
 * @license  http://www.opensource.org/licenses/mit-license.php The MIT License
 * @link     http://www.claritymediasolutions.com/portfolio/croogo-event-plugin
 */
class FeaturedImageBehavior extends ModelBehavior {

    /**
     * Nodeattachment model
     *
     * @var object
     */
    private $FeaturedImage = null;

    /**
     * Setup
     *
     * @param object $model
     * @param array  $config
     * @return void
     */
    public function setup(Model $model, $config = Array()) {
        if (is_string($config)) {
                $config = array($config);
        }

        $this->settings[$model->alias] = $config;


    }

    /**
     * After find callback
     *
     * @param object $model
     * @param array $results
     * @param boolean $primary
     * @return array
     */
     public function  afterFind(Model $model, $results, $primary = false) {

            parent::afterFind($model, $results, $primary);

            if ($model->type != 'event') {
                    if ($primary && isset($results[0][$model->alias])) {
                        foreach ($results AS $i => $result) {
                            if (isset($results[$i][$model->alias]['title'])) {
                                $results[$i]['FeaturedImage'] = $this->_getFeaturedImages($model, $result[$model->alias]['id']);
                            }
                        }
                    } elseif (isset($results[$model->alias])) {
                        if (isset($results[$model->alias]['title'])) {
                            $results['FeaturedImage'] = $this->_getFeaturedImages($model, $results[$model->alias]['id']);
                        }
                    }
            }

            return $results;

    }

    /**
     * Get all attachments for node
     *
     * @param object $model
     * @param integer $nodeid
     * @return array
     */
    private function _getFeaturedImages(&$model, $node_id) {
        if (!is_object($this->FeaturedImage)) {
                $this->FeaturedImage = ClassRegistry::init('FeaturedImage.FeaturedImage');
        }


        // unbind unnecessary models from Node model
        $model->unbindModel(array(
            'belongsTo' => array('User'),
            'hasMany' => array('Comment', 'Meta'),
            'hasAndBelongsToMany' => array('Taxonomy')
        ));

        $model->recursive = 0;

        App::import('Model', 'FeaturedImage.FeaturedImage');
        $eventmodel = new FeaturedImage();

        $events = $eventmodel->find('first', array(
            'conditions' => array('FeaturedImage.node_id' => $node_id)
        ));

        if(count($events)> 0){
            return $events['FeaturedImage'];
        } else {
        	return null;
        }
    }
}