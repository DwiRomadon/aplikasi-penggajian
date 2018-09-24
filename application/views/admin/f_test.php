<form action="<?php echo base_URL(); ?>index.php/test/" method="POST">
    <div class="col-lg-5">
        <table width="100%" class="table-form">
            <tr><td>Perkiraan</td><td colspan="3">
                    <select name="id" class="form-control selectpicker"
                             data-live-search="true" required>
                        <option value="">-- Perkiraan --</option>
                        <?php

                         if (empty($showtbl)) {
                            echo "<tr><td colspan='6'  style='text-align: center; font-weight: bold'>--Data tidak ditemukan--</td></tr>";
                        } else {
                            foreach ($showtbl as $b) {
                                $id = $b->id;
                                $nama    = $b->nama;

                                $teks    = $id."-".$nama;

                                $pecah   = explode("-", $teks);
                                ?>
                                    <option value="<?php echo $pecah[0]?>"><?php echo $b->nama?></option>
                                <?php

                            }
                        }?>
                    </select>
                </td>
            </tr>
            <form action="<?php echo base_URL(); ?>index.php/test/" method="POST">
            <?php
                foreach ($tbl as $asem){


            ?>
            <input value="<?php echo $asem->nama?>" id="s_name">
            <input value="<?php echo $asem->id?>" id="product_names">
                    <table cellpadding="4" width="40%"  align="center" cellspacing="4" id="mytab" border="1">
                        <tr>
                            <th>Nama</th>
                            <th>Jenis</th>
                            <th>Jumlah</th>
                            <th colspan="2">Action</th>
                        </tr>

                        <tr id="dummy">
                            <td colspan="11">No data</td>
                        </tr>
                    </table>
            <?php }?>
                <br><button type="submit" id="order" value="Order"  class="btn btn-success" tabindex="9" ><i class="icon icon-ok icon-white"></i> woi</button>
            </form>
            <tr><td colspan="3">
                    <br><button type="button" id="order" value="Order" onclick="AddData()"  class="btn btn-success" tabindex="9" ><i class="icon icon-ok icon-white"></i> Submit</button>
                </td></tr>
        </table>
    </div>
</form>

<script type="text/javascript">

    var cnt=0;
    var count=1;

    function BindData(count)
    {
        $("#s_name").val($("#name_"+count).html());
        $("#product_names").val($("#pro_"+count).html());

    }

    function AddData()
    {

        var shop_name = $("#s_name").val();
        var pro_name = $("#product_names").val();


        $("#mytab").append('<tr><td id="name_'+count+'">'+ shop_name +'</td><td id="pro_'+count+'">'+ pro_name
            +'</td><td><input type="text" size="30" class="txt"></td></td><td><button type="button" class="delete">Delete</button></td></tr>');
        cnt++;
        count++;


        $("#s_name").val("");

        if(cnt>0)
        {
            $("#dummy").hide();
        }
    }

    $(document).ready(function()
    {
        $("#price,#t_pro").blur(function () {

            $('#total_price').val($('#price').val() * $('#t_pro').val());

        });

        $(document).on('click','.delete',function(){
            //When delete the record then clear all checkboxes
            $('input[type=checkbox]').each(function()
            {
                this.checked = false;
            });
            var par = $(this).parent().parent(); //tr
            par.remove();
            cnt--;
            if(cnt==0)
            {
                $("#dummy").show();
            }
        });


    });
</script>