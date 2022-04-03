    <?php
        if(isset($_POST['vote']) && !isset($_COOKIE['vote'])){
            $data = time().'.'.$_POST['vote'];
            setcookie('vote',$data,time()+60*2,'/');
        ?>
            <div class="sucess">
                <h3>Votre vote a été bien enregistré</h3>                
            </div>
        <?php
        }else if(isset($_POST['vote']) && isset($_COOKIE['vote'])){
            $cok = $_COOKIE['vote'];
            $pos = strpos($cok,'.');
            $rep = substr($cok,$pos-strlen($cok)+1);
            $tmp = substr($cok,0,$pos);
            $plus = 120-time()+$tmp;
        ?>        
            <div class="alert">
                <h4>Vous avez déjà voté "<?=$rep ?>" !<br>
                Vous pouvez voter dans <?=intdiv($plus,60) ?> min <?=$plus%60 ?>s
                </h4>                
            </div>
        <?php
        }
    ?>
    
    