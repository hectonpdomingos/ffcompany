


<?php
session_start();

$msg = $_SESSION["error"];
echo $msg;
?>




               <form id="warehousepkg" class="edituser" action="multifunc.php" method="post">

                      <div class="row">
                      <div class="col-xs-6 col-sm-3">
                      <label for="packagetracknumber">Package track number</label><br>
                      <input id="packagetracknumber" value="<?php echo $pkgtrack_number; ?>" name="packagetracknumber" type="text" class="form-control" aria-describedby="sizing-addon1">
                      </div>
                      <div class="col-xs-6 col-sm-2">
                      <label for="packagefrom">Package From</label><br>
                      <input id="packagefrom" value="<?php echo $pkgfrom; ?>" name="packagefrom" type="text" class="form-control" aria-describedby="sizing-addon1">
                      </div>
                      <div class="col-xs-6 col-sm-2">
                      <label for="packageweight">Package Weight</label><br>
                      <input id="packageweight" value="<?php echo $pkgweight; ?>" name="packageweight" type="text" class="form-control" aria-describedby="sizing-addon1">
                      </div>
                      <div class="col-xs-6 col-sm-3">
                      <label for="packageuseremail">User Email</label><br>
                      <input id="packageuseremail"  value="<?php echo $pkguser_email; ?>" name="packageuseremail" type="text" class="form-control" aria-describedby="sizing-addon1">
                      </div>
                      <div class="col-xs-6 col-sm-3">
                      <label for="packagearrived">Package arrived</label><br>
                      <div class='input-group date' id='datetimepkg'>
                      <input class="form-control" disabled="" id="packagearrived" value="<?php echo $pkgdate_arrive; ?>" name="packagearrived" type="datetime" />
                      <span class="input-group-addon">
                      <span class="glyphicon glyphicon-calendar"></span>
                      </span>
                      </div>
                      </div>
                      <div class="col-xs-6 col-sm-4">
                      <label>Status</label><br>
                      <select name="packagestatus">
                        <option value="In hold">In hold</option>
                        <option value="Processing">Processing</option>
                        <option value="Waiting for orders">Waiting for orders</option>
                      </select>
                      </div>
                      <div class="col-xs-6 col-sm-4">
                      </div>

                      </div>
                    <button class="btn btn-info btn-sm"  type="submit" value="1" name="updatepkg">Update</button>
                    <button class="btn  btn-success btn-sm"  type="submit" value="2" name="addpkg">Add package</button>
                  </form>
                </form>




<br>

<br>

<form id="teste" action="multifunc.php" method="post">
<input id="packagetracknumber" name="packagetracknumber" type="text" value="">
<input id="userEmail" name="userEmail" type="text" value="">
<button type="submit" name="testando">Enviar</button>

</form>
