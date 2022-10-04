<div class="container-fluid">
    <div class="side-body padding-top">
        <h1 class="page-title">
            <i class="voyager-list"></i>
            Add Timesheet
        </h1>
        <div id="voyager-notifications"></div>
        <div class="page-content edit-add container-fluid">
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-bordered">
                        <!-- form start -->
                        <form role="form" class="form-edit-add" action="http://localhost:8000/admin/timesheets" method="POST" enctype="multipart/form-data">
                            <!-- PUT Method if we are editing -->

                            <!-- CSRF TOKEN -->
                            <input type="hidden" name="_token" value="viU4WtMqamtAUfxzOXrrzTrS31u6SOZnPKdlYbX7">

                            <div class="panel-body">


                                <!-- Adding / Editing -->

                                <!-- GET THE DISPLAY OPTIONS -->

                                <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">Hm Awal</label>
                                    <input type="number" class="form-control" name="hm_awal" type="number" step="any" placeholder="Hm Awal" value="">


                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->

                                <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">Hm Akhir</label>
                                    <input type="number" class="form-control" name="hm_akhir" type="number" step="any" placeholder="Hm Akhir" value="">


                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->

                                <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">Keterangan</label>
                                    <input type="text" class="form-control" name="Keterangan" placeholder="Keterangan" value="">


                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->

                                <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">Foto</label>
                                    <input type="file" name="foto" accept="image/*">


                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->

                                <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">karyawans</label>
                                    <!--<select class="form-control select2-ajax" name="id_karyawan" data-get-items-route="http://localhost:8000/admin/timesheets/relation" data-get-items-field="timesheet_belongsto_karyawan_relationship" data-method="add" required>


                                    </select>

                                    -->



                                </div>
                                <!-- GET THE DISPLAY OPTIONS -->

                                <div class="form-group  col-md-12 ">

                                    <label class="control-label" for="name">units</label>
                                    <!--<select class="form-control select2-ajax" name="id_unit" data-get-items-route="http://localhost:8000/admin/timesheets/relation" data-get-items-field="timesheet_belongsto_unit_relationship" data-method="add" required>

                                    </select>
                                    -->

                                </div>

                            </div><!-- panel-body -->

                            <div class="panel-footer">
                                <button type="submit" class="btn btn-primary save">Save</button>
                            </div>
                        </form>

                        <div style="display:none">
                            <input type="hidden" id="upload_url" value="http://localhost:8000/admin/upload">
                            <input type="hidden" id="upload_type_slug" value="timesheets">
                        </div>
                    </div>
                </div>
            </div>
        </div>