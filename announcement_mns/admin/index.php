<?php 
    include('../../path.php');
    include(ROOT_PATH."/portal_app/db_functions.php");
    include(ROOT_PATH."/backend/app_master/head_link.php");
    include(ROOT_PATH."/backend/app_master/import_funcs.php");
    include(ROOT_PATH."/portal_app/helpers/middleWare.php");
    checkSessionStatus();
?>


<!-- <body> -->
<body data-topbar="dark">
<style type="text/css">
    .sb_li_icon {
      font-size: 18px;
    }

    .bootstrap-tagsinput .tag{
        margin-right: 2px;
        color: red;
        font-weight: 700px;
    } 
</style>
    <!-- Begin page -->
    <div id="layout-wrapper">
        <?php 
            include(ROOT_PATH."/backend/app_master/header.php"); 
            include(ROOT_PATH."/announcement_mns/admin/_sidebar.php"); 
        ?>
        <div class="main-content">
            <div class="page-content">
                <div class="container-fluid">
                    <?php echo page_title('Panelim' , 'Anasayfa') ?>
                    <?php 
                        if(isset($_GET['page']) && $_GET['page'] == 'list')
                            include(ROOT_PATH."/announcement_mns/admin/_manage_list.php"); 
                        elseif(isset($_GET['page']) && $_GET['page'] == 'add')
                            include(ROOT_PATH."/announcement_mns/admin/_create_new.php");
                        elseif(isset($_GET['page']) && $_GET['page'] == 'edit')
                            include(ROOT_PATH."/announcement_mns/admin/_info_edit.php");
                        else 
                            include(ROOT_PATH."/announcement_mns/admin/_manage_list.php"); 
                    ?>
                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->
            <?php include(ROOT_PATH."/backend/app_master/footer.php"); ?>
        </div>

    </div>

<?php 
include(ROOT_PATH."/backend/app_master/foot_link.php"); ?>
<script>


$(document).ready(function(){
    $(document).on('submit', '#create_info_form', function(e){
        e.preventDefault();
        var actionUrl = $(this).attr('action'); 
        var method = $(this).attr('method');
        console.log(actionUrl + '--' + method)
        // Check if form is valid
        if (!this.checkValidity()) {return;}
        // var formData = $(this).serialize();
        var formData = new FormData(this);
        formData.append("_action", "CREATE_NEW_INFO");
        console.log(formData);
        alertAfterProcess(method, actionUrl, formData)
        // alertOperation("", "", "", 0, "", "", 0, method, actionUrl, formData)
    });

    $(document).on('submit', '#update_info_form', function(e){
        e.preventDefault();
        var actionUrl = $(this).attr('action'); 
        var method = $(this).attr('method');
        if (!this.checkValidity()) {return;}
        var formData = new FormData(this);
        formData.append("_action", "UPDATE_INFO");
        alertAfterProcess(method, actionUrl, formData)
    });

    

    $(document).on('change', '#target_choice', function(e){
        e.preventDefault()
        selected = $(this).val()
        console.log($(this).val())
        if(selected == "departs") $('#departs_div').show()
        if(selected == "all") $('#departs_div').hide()
    })

    $(document).on('click', '.delInfo', function(e){
        e.preventDefault()
        id = $(this).attr('data-id')
        console.log('id ' + id)
        data = {'_action':'DELETE_INFO', 'id' : id}
        alertWithQuestion('Duyuru Silme', 'question', 'Bu duyuruyu silmek istediğnizden emin misiniz ? Değilseniz şimdilik yayında görünmemesi için devre dışı durumuna bırakabilirsiniz.', 
        1, 'EVET', 'Hayir', 0, 'POST', '../bkg_process.php', data)
    })

    $(document).on('click', '.publishInfo', function(e){
        e.preventDefault()
        id = $(this).attr('data-id')
        console.log('id ' + id)
        data = {'_action':'PUBLISH_INFO', 'id' : id}
        alertWithQuestion('Duyuru Yayınlama', 'question', 'Bu duyuruyu yayınlamak istediğnizden emin misiniz ?', 
        1, 'EVET', 'Hayir', 0, 'POST', '../bkg_process.php', data)
    })

    $(document).on('click', '.unpublishInfo', function(e){
        e.preventDefault()
        id = $(this).attr('data-id')
        console.log('id ' + id)
        data = {'_action':'UNPUBLISH_INFO', 'id' : id}
        alertWithQuestion('Duyuru Silme', 'question', 'Bu duyuruyu yayından kaldırmak istediğnizden emin misiniz ?', 
        1, 'EVET', 'Hayir', 0, 'POST', '../bkg_process.php', data)
    })

    


    
})
</script>
</body>

</html>