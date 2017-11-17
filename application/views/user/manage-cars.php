<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Manage Cars</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row car-list-row">
        <div class="col-md-3">
            <div class="panel panel-warning">
                <div class="panel-heading">
                    Add Car
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <?=form_open_multipart('', '', $hidden); ?>
                            <form id="addCarForm" role="form">
                                <div class="form-group">
                                    <label for="carImage">Car Image: </label>
                                    <input type="file" name="image_name" id="carImage" accept="Image/*" required>
                                </div>
                                <div class="form-group car-variations-select">
                                    <label for="carVariation">Car Variation: </label>
                                    <select name="car_variation" id="carVariation" required>
                                        <?php 
                                            foreach($carVariations as $variation):
                                                echo "<option value='".$variation['id']."'>".$variation['company']. " " . $variation['model'] . "</option>";
                                            endforeach;
                                        ?>
                                    </select>
                                    <a href="#" class="add-new-variation" data-toggle="modal" data-target="#addVariationModal">+ Add New</a>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Color" name="color" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Plate No." name="plate_no" required>
                                </div>
                                <div class="form-group">
                                    <input type="text" class="form-control" placeholder="Rate" name="rate" required>
                                </div>
                                <button type="reset" class="btn btn-default">Reset</button>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.row -->
    <?php
        $item_ctr = 1; # car form already included in row
        foreach ($cars as $car) :
            if(($item_ctr % 4) == 0){
                echo "<div class=\"row car-list-row\">";
            }

            if($item_ctr = 0)
    ?>
        <div class="col-md-3 car-card">
            <div class="card">
                <img class="card-img-top" src=<?=base_url()."uploads/".$car["image_name"]; ?> alt="Card image cap">
                <div class="card-block">
                    <h3 class="card-title"><?=$car["company"]." ".$car["model"] ?></h3>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Year: <?=$car["year"]; ?></li>
                    <li class="list-group-item">Type: <?=$car["type"]; ?></li>
                    <li class="list-group-item">No. of seats: <?=$car["number_of_seats"]; ?></li>
                    <li class="list-group-item">Plate No.: <?=$car["plate_no"] ?></li>
                    <li class="list-group-item">Rate(per day): PHP <?=$car["rate"]; ?></li>
                </ul>
                <div class="card-block">
                    <button type="button" onclick="deleteCar(<?=$car['id'];?>)" class="card-link btn btn-danger">Delete</button>
                    <button type="button" id="<?=$car['id'];?>" onclick="editCar(<?=$car['id'];?>)" class="card-link btn btn-primary">Edit</button>
                </div>
            </div>
        </div>

    <?php
        $item_ctr++;

        if(($item_ctr % 4) == 0){
            echo "</div>"; //close row
        }

    endforeach;

    if(($item_ctr % 4) != 0){
        echo "</div>"; //close row
    }
    ?>
</div>
<!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- Modal -->
<div id="addVariationModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add Car Variety</h4>
    </div>
    <div class="modal-body">
        <form id="addVariationForm">
            <div class="form-group">
                <input type="text" class="form-control" name="company" placeholder="Company" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="model" placeholder="Model" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="type" placeholder="Type" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="year" placeholder="Year" required>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="number_of_seats" placeholder="Number of seats" required>
            </div>            
    </div>
    <div class="modal-footer">
        <button type="button" class="btn btn-default" onclick="resetModal()" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-success">Add</button>
        </form>
    </div>
</div>

</div>
</div>

<script>
    function resetModal(){
        $('#addVariationModal').modal('hide');
        $('#addVariationForm').find('input:text').val('');
    }

    $(function(){
        $('#addVariationForm').submit(function(e){
            e.preventDefault();
            $.ajax({
                url: '<?=base_url();?>cars/insert_car_variation',
                type: 'POST',
                dataType: 'JSON',
                data: $(this).serialize(),
                success: function(data){
                    alert(data.message);
                    resetModal();
                    window.location.reload();
                },
                error: function(xhr){
                    alert(xhr.responseText);
                }
            });
        });

        $('#addCarForm').submit(function(e){
            e.preventDefault();
            var fd = new FormData(this);
            var image = $('#carImage').prop('files')[0];
            fd.append('image_name', image);
            alert(image);
            $.ajax({
                url: '<?=base_url();?>cars/insert_car',
                type: 'POST',
                dataType: 'JSON',
                processData: false,
                contentType: false,
                data: fd,
                success: function(data){
                    alert(data.message);
                    window.location.reload();
                },
                error: function(xhr){
                    alert(xhr.responseText);
                }
            });
        });
    });
</script>
