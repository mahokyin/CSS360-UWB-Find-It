<?php
foreach ($itemsArray as $item) : ?>

                        <div class="col-sm-6 col-md-4">
                            <div class="thumbnail">
                               <a href= <?php echo $item->getImgPath();?> ><img data-src="holder.js/100%x200" alt="100%x200" src="<?php echo $item->getImgPath();?>" data-holder-rendered="true" style="height: 200px; width: 100%; display: block;"></a>
                                <div class="caption">
                                    <h3><?php echo $item->getName();?></h3>
                                    <p><?php echo $item->getDate();?></p>
                                    <p><?php echo $item->getLocation();?></p>
                                    <p><?php echo $item->getDes();?></p><p>
                                    </p>
                                        <!--<a class="btn btn-primary" role="button">Edit</a>-->
                                         <form action="delete.php" method = "get">
                                            <input type="hidden" name="uid" value= "<?php echo $item->getId();?>" /> 
                                        <input class="btn btn-default" type="submit" name = "deletePost"  role="button" value = "Delete">
                                        </form>                               
                                </div>
                            </div>
                        </div>
                     
<?php endforeach ?>


