<?php
/**
 * Created by PhpStorm.
 * User: artem
 * Date: 17.10.15
 * Time: 22:35
 */

$services = $this->services;

?>
<div>
    <?php foreach($services as $service) : ?>
    <p><?php echo $service->getName(); ?></p>
    <?php endforeach; ?>
</div>
