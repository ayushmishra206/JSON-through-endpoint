<?php
/**
 * @file
 * Contains \Drupal\node_endpoint\Controller\NodeController.
 */
namespace Drupal\node_endpoint\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Controller for export json.
 */
class NodeEndpointController extends ControllerBase {

  /**
   * {@inheritdoc}
   */
   
  public function data($api_key, $content_type, $node_id)
   {
    $config = $this->config('system.site');
    $error= array('error'=>'Wrong API Key!');
    $contentTypes = \Drupal::service('entity.manager')->
    getStorage('node_type')->loadMultiple();

        if ($api_key==$config->get('siteapikey')) 
        {
          foreach ($contentTypes as $contentType) 
          {
            if ($contentType->id()==$content_type) 
            {
              $json_array = array(
                'data' => array()
              );
              $nid = $node_id;
              $node_storage = \Drupal::entityTypeManager()->getStorage('node');
              $node = $node_storage->load($nid);
                $json_array['data'][] = array(
                  'type' => $node->get('type')->target_id,
                  'id' => $node->get('nid')->value,
                  'attributes' => array(
                    'title' =>  $node->get('title')->value,
                    'content' => $node->get('body')->value,
                  ),
                );
                return new JsonResponse($json_array);         
            }
            else
            $error= array('error'=>'Wrong Content Type!');
            return new JsonResponse($error);    
          }
       } 
       else
       return new JsonResponse($error);   
   }
}