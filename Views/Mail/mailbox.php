<?php 
    headerAdmin($data);
    $inbox = array();
    //$sent = $data['sent'];
    $total ="";
    if($data['inbox']['status']){
        $inbox = $data['inbox'];
        $total ='('.$inbox['total'].')';
        if($inbox['total'] != 0){
            $total = '<span class="badge bg-danger">'.$inbox['total'].'</span>';
        }
    }
?>
<div id="modalItem"></div>
<div class="body flex-grow-1 px-3" id="<?=$data['page_name']?>">
    <div class="container-lg">
        <div class="card">
            <?php if($_SESSION['idUser']== 1){ ?>
            <div class="card-body">
                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="inbox-tab" data-bs-toggle="tab" data-bs-target="#inbox" type="button" role="tab" aria-controls="inbox" aria-selected="true">Bandeja de entrada <?=$total?></button>
                    </li>
                </ul>
                
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane show active" id="inbox" role="tabpanel" aria-labelledby="inbox-tab">
                        <div class="scroll-y">
                            <?php if(isset($inbox['total'])){?>
                                <?=$inbox['data']?>
                            <?php }else{?>
                                <div class="mail-item d-flex justify-content-center align-items-center">
                                    <p class="m-0">No hay datos</p>
                                </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <?php }?>
        </div>
    </div>
</div>
<?php footerAdmin($data)?>        