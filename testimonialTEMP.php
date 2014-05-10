<div class="entry-content col-md-10">
        
            <?php
            
            if (empty ($date) && empty ($size) && empty ($contact)) {
                
                $introblock = '';
                
            } else {
            
                $introblock = 'introblock';
            
            }
            
            ?>
            <div class="orangeback emphasis-text <?php echo $introblock; ?>">   
            <?php

                if(!empty ($date)){
                    ?><p>Date Started:&nbsp;<?php echo $date;
                    ?></p><?php
                } else {
                $introblock = '';
                return;
                } 

                if(!empty ($size)){
                    ?><p>Size of School:&nbsp;<?php echo $size;
                    ?></p><?php

                } else {
                $introblock = '';
                return;
                }

                if(!empty ($contact)){
                    ?><p>Contact Person:&nbsp;<?php echo $contact;
                    ?></p><?php

                } else {
                $introblock = '';
                return;
                }

                ?>
            
            
            </div>
            
            <?php
            if(!empty($testimonial) ){
            ?>
            <blockquote><i class="i-2x icon-quote-left"></i>&nbsp;&nbsp;
                <?php echo $testimonial; ?> 
                <span class="person">- <?php the_field('testimonial_person');?>, <?php the_field('person_title'); ?>
                </span></blockquote>
            <?php
            } else {
            return;
            }
            ?>
        <?php the_content(); ?>
        </div>