<?php
$user_role = $this->session->userdata('role');
?>
<div class="main-content">
    <div class="wrap-content container" id="container">
        <!-- start: PAGE TITLE -->
        <section id="page-title">
            <div class="row">
                <div class="col-sm-8">
                    <h1 class="mainTitle">Session Details</h1>
                </div>
            </div>
        </section>
        <!-- end: PAGE TITLE -->
        <!-- start: DYNAMIC TABLE -->
        <div class="container-fluid container-fullw">
            <div class="row">
                <form name="add_sessions_frm" id="add_sessions_frm" action="<?= isset($sessions_edit) ? base_url() . "admin/sessions/updateSessions" : base_url() . "admin/sessions/createSessions" ?>" method="POST" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <div class="panel panel-primary" id="panel5">
                            <div class="panel-heading">
                                <h4 class="panel-title text-white text-bold">Session Details
                                    <?php if(isset($sessions_edit->sessions_id)){ ?>
                                        <div class="dropdown" style="float:right">
                                            <button class="fa fa-cogs btn btn-warning btn-sm" type="button" data-toggle="dropdown">
                                                <span class="caret"></span></button>
                                            <ul class="dropdown-menu">
                                                <li><a data-sessions-id="<?= $sessions_edit->sessions_id ?>" class="btn btn-sm delete-session-photo" >Delete All Session Photos</a></li>
                                            </ul>
                                        </div>
                                    <?php }?>
                                    <h4>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                                <div class="col-md-12">
                                    <?php if (isset($sessions_edit)) { ?>
                                        <input type="hidden" name="sessions_id" id="sessions_id" value="<?= $sessions_edit->sessions_id ?>">
                                    <?php } ?>
                                    <div class="form-group">
                                        <label class="text-large text-bold">Sessions Title</label>
                                        <input type="text" name="session_title" id="session_title" value="<?= (isset($sessions_edit) && !empty($sessions_edit) ) ? $sessions_edit->session_title : "" ?>" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-large text-bold">VIP Session</label><span class="badge badge-success"> new </span>
                                        <input type="checkbox" name="vip_session" id="vip_session" value="1" class="form-inline" <?= (isset($sessions_edit) && !empty($sessions_edit) && $sessions_edit->vip_session=="1") ?"checked": "" ?>><small style="color:red"> <==== Check if SESSION is for VIP </small>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-large text-bold">Sessions Description</label>
                                        <textarea class="form-control" style="color: #000;" name="sessions_description" id="sessions_description"><?= (isset($sessions_edit) && !empty($sessions_edit) ) ? $sessions_edit->sessions_description : "" ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label class="text-large text-bold">Session Notes</label>
                                        <textarea class="form-control" style="color: #000;" name="session_notes" id="sessions_description"><?= (isset($sessions_edit) && !empty($sessions_edit) ) ? $sessions_edit->session_notes : "" ?></textarea>
                                    </div>

                                    <div class="form-group" <?=($user_role != 'super_admin')?'style="display:none"':''?>>
                                        <div class="row">
                                            <label class="col-md-12 text-large text-bold">PPT Status</label>
                                            <div class="form-group col-md-12">

                                                <label class="checkbox-inline"><input type="checkbox" name="ppt_uploaded" <?= (isset($sessions_edit) && !empty($sessions_edit)) ? ($sessions_edit->ppt_uploaded == "1") ? 'checked' : '' : '' ?> value="1" >PPT Uploaded</label>
                                                <label class="checkbox-inline"><input type="checkbox" name="ppt_link_shared" <?= (isset($sessions_edit) && !empty($sessions_edit)) ? ($sessions_edit->ppt_link_shared == "1") ? 'checked' : '' : '' ?> value="1">PPT Link Shared</label>

                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="text-large text-bold">Theme Colour</label><br>
                                        <small style="color: grey;font-size: 13px;font-weight: bold;">This colour will fill the horizontal line at the top of attendee page as well as the toolbox icon boxes.</small>
                                        <div class="input-group">
                                            <span class="input-group-addon" style="background-color: grey;border-color: grey;">#</span>
                                            <input type="text" placeholder="Enter hex code without #" class="form-control" id="themeColor" name="theme_color" value="<?=(isset($sessions_edit->theme_color) && !empty($sessions_edit->theme_color))?$sessions_edit->theme_color:'674ea0'?>">
                                        </div>
                                        <small style="color: grey;">(Enter hex code in the input box or simply pick a colour using colour picker)</small><br>
                                        <input style="margin-top: 7px" type="color" id="themeColorHex" name="theme_color_hex" value="#<?=(isset($sessions_edit->theme_color) && !empty($sessions_edit->theme_color))?$sessions_edit->theme_color:'674ea0'?>">
                                    </div>

                                    <hr style="border: 2px solid;">
                                    <div class="form-group">
                                        <label class="text-large text-bold">CCO Event ID (cssid)</label>
                                        <input type="text" name="cco_envent_id" id="cco_envent_id" value="<?= (isset($sessions_edit) && !empty($sessions_edit) ) ? $sessions_edit->cco_envent_id : "" ?>" class="form-control" placeholder="CCO ID">
                                    </div>
                                    <div class="form-group" <?=($user_role != 'super_admin')?'style="display:none"':''?>>
                                        <label class="text-large text-bold">Unique Identifier</label>
                                        <input type="text" name="unique_identifier" id="unique_identifier" readonly value="<?= (isset($sessions_edit) && !empty($sessions_edit) ) ? $sessions_edit->sessions_id : $unique_identifier_id ?>" class="form-control" placeholder="Unique Identifier" <?=($user_role != 'super_admin')?'readonly':''?>>
                                        <hr style="border: 2px solid;">
                                    </div>

                                    <div class="form-group">
                                        <label class="text-large text-bold">Zoom Meeting Link</label>
                                        <input type="text" name="zoom_link" id="zoom_link" value="<?= (isset($sessions_edit) && !empty($sessions_edit) ) ? $sessions_edit->zoom_link : "" ?>" class="form-control" placeholder="Zoom Meeting Link">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-large text-bold">Zoom Meeting Number</label>
                                        <input type="text" name="zoom_number" id="zoom_number" value="<?= (isset($sessions_edit->zoom_number) && !empty($sessions_edit->zoom_number) ) ? $sessions_edit->zoom_number : "" ?>" class="form-control" placeholder="Zoom Meeting Number">
                                    </div>
                                    <div class="form-group">
                                        <label class="text-large text-bold">Password</label>
                                        <input type="text" name="zoom_password" id="zoom_password" value="<?= (isset($sessions_edit) && !empty($sessions_edit) ) ? $sessions_edit->zoom_password : "" ?>" class="form-control" placeholder="Password">
                                        <hr style="border: 2px solid;">
                                    </div>

                                    <div class="form-group" <?=($user_role != 'super_admin')?'style="display:none"':''?>>
                                        <label class="text-large text-bold">Moderator</label>
                                        <select class="form-control" style="height:400px;line-height:300px" id="moderator_id" name="moderator_id[]" multiple <?=($user_role != 'super_admin')?"style='pointer-events:none;' readonly":''?>>
                                            <?php if(!isset($sessions_edit)){ ?>
                                                <option selected="" value="">Select Moderator</option>
                                            <?php } ?>
                                            <?php
                                            if (isset($presenter) && !empty($presenter)) {
                                                foreach ($presenter as $val) {
                                                    ?>
                                                    <option value="<?= $val->presenter_id ?>" <?= (isset($sessions_edit) && !empty($sessions_edit) ) ? in_array($val->presenter_id, explode(",", $sessions_edit->moderator_id)) ? "selected" : "" : "" ?>><?= $val->presenter_name ?></option>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </select>
                                    </div>
                                    <!--                                    <div class="form-group">
                                                                            <label class="text-large">Presenter:</label>
                                                                            <select class="form-control" id="presenter_id" name="presenter_id">
                                                                                <option selected="" value="">Select Presenter</option>
                                    <?php
                                    if (isset($presenter) && !empty($presenter)) {
                                        foreach ($presenter as $val) {
                                            ?>
                                                                                                                                                                                                                <option value="<?= $val->presenter_id ?>" <?= (isset($sessions_edit) && !empty($sessions_edit) ) ? ($sessions_edit->presenter_id == $val->presenter_id) ? "selected" : "" : "" ?>><?= $val->presenter_name ?></option>
                                            <?php
                                        }
                                    }
                                    ?>
                                                                            </select>
                                                                        </div>-->
                                    <div class="form-group">
                                        <label class="text-large text-bold">Session Date</label>
                                        <input class="form-control <?=($user_role != 'super_admin')?'':'datepicker'?>" name="sessions_date" id="sessions_date" type="text" value="<?= (isset($sessions_edit) && !empty($sessions_edit)) ? date('m/d/Y', strtotime($sessions_edit->sessions_date)) : "" ?>">
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-large text-bold">Session Start Time<?= (isset($sessions_edit) && !empty($sessions_edit) ) ? '<b>(ET)</b>' : '' ?></label>
                                                <input type="time" name="time_slot" id="time_slot" value="<?= (isset($sessions_edit) && !empty($sessions_edit)) ? date('H:i', strtotime($sessions_edit->time_slot)) : "" ?>" class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label class="text-large text-bold">Session End Time <?= (isset($sessions_edit) && !empty($sessions_edit) ) ? '<b>(ET)</b>' : '' ?></label>
                                                <input type="time" name="end_time" id="end_time" value="<?= (isset($sessions_edit) && !empty($sessions_edit)) ? date('H:i', strtotime($sessions_edit->end_time)) : "" ?>" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" <?=($user_role != 'super_admin')?'style="display:none"':''?>>
                                        <label class="text-large text-bold">Millicast Stream Name</label>
                                        <input type="text" class="form-control" style="color: #000;" name="embed_html_code" id="embed_html_code" value="<?= (isset($sessions_edit) && !empty($sessions_edit) ) ? $sessions_edit->embed_html_code : "" ?>" <?=($user_role != 'super_admin')?'readonly':''?>>
                                    </div>
                                    <div class="form-group" <?=($user_role != 'super_admin')?'style="display:none"':''?>>
                                        <label class="text-large text-bold">Embed HTML Code <b>(Presenter)</b></label>
                                        <textarea class="form-control" style="color: #000;" placeholder="Embed HTML Code" name="embed_html_code_presenter" id="embed_html_code_presenter" <?=($user_role != 'super_admin')?'readonly':''?>><?= (isset($sessions_edit) && !empty($sessions_edit) ) ? $sessions_edit->embed_html_code_presenter : "" ?></textarea>
                                        <hr style="border: 2px solid;"/>
                                    </div>

                                    <div class="row" <?=($user_role != 'super_admin')?'style="display:none"':''?>>
                                        <label class="col-md-12 text-large text-bold">Select Session Type</label>
                                        <?php
                                        if (isset($sessions_type) && !empty($sessions_type)) {
                                            foreach ($sessions_type as $val) {
                                                if ($val->sessions_type != "") {
                                                    ?>
                                                    <div class="form-group col-md-6" style="color: #000;">
                                                        <input type="checkbox" class="col-md-1"  name="sessions_type[]" <?= (isset($sessions_edit) && !empty($sessions_edit)) ? in_array($val->sessions_type_id, explode(",", $sessions_edit->sessions_type_id)) ? 'checked' : '' : '' ?> id="sessions_type" value="<?= $val->sessions_type_id ?>" <?=($user_role != 'super_admin')?"onclick='return false;' onkeydown='return false; readonly'":''?>> <?= $val->sessions_type ?><br>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </div>

                                    <hr style="border: 2px solid;"/>
                                    <div class="row" <?=($user_role != 'super_admin')?'style="display:none"':''?>>
                                        <label class="col-md-12 text-large text-bold">Zoom Redirect</label>
                                        <div class="form-group col-md-6" style="color: #000;">
                                            <input type="radio" class="col-md-1"  name="zoom_redirect"  id="zoom_redirect_on" <?=(isset($sessions_edit->zoom_redirect) && $sessions_edit->zoom_redirect == "1") ?'checked':''?> value="1">ON<br>
                                        </div>
                                        <div class="form-group col-md-6" style="color: #000;">
                                            <input type="radio" class="col-md-1"  name="zoom_redirect"  id="zoom_redirect_off" <?=(isset($sessions_edit->zoom_redirect) && $sessions_edit->zoom_redirect == "0") ?'checked':''?>  value="0">OFF<br>
                                        </div>

                                        <div class="col-md-12" id="url_section">
                                            <div class="form-group">
                                                <label class="text-large text-bold">Redirect URL(must be prefixed with http or https)</label>
                                                <input type="text" name="zoom_redirect_url" id="zoom_redirect_url" value="<?= (isset($sessions_edit->zoom_redirect_url) && !empty($sessions_edit->zoom_redirect_url) ) ? $sessions_edit->zoom_redirect_url : "" ?>" class="form-control" placeholder="Zoom redirect url">
<!--                                                <small style="color: darkred;">To test Zoom redirect; Go to <a href="--><?//=base_url()?><!--sessions/attend/--><?//= $sessions_edit->sessions_id ?><!--?testing" target="_blank">--><?//=base_url()?><!--sessions/attend/--><?//= $sessions_edit->sessions_id ?><!--?testing</a>  as an <span style="color: blue;">attendee</span> and wait 5 seconds(countdown is set to 5 seconds for testing)</small>-->
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row" <?=($user_role != 'super_admin')?'style="display:none"':''?>>
                                        <label class="col-md-12 text-large text-bold">
                                            Redirect On Button Click <span class="badge badge-success">new</span>
                                            <br><small style="color: red;font-size: 12px;">Regardless the session is over or not, this feature will redirect the user on a button click.</small>
                                            <br><small style="color: red;font-size: 12px;">This will have no effect unless configured before attendees loading their page.</small>
                                            <br><small style="color: red;font-size: 12px;">IF the session is for VIP the VIP will redirect the sessions but the NON-VIP will redirect to the lobby</small>
                                        </label>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-large" style="color: #05969d;">Subsequent Session 1</label>
                                                <select class="form-control" id="subsequent_session_1" name="subsequent_session_1" <?=($user_role != 'super_admin')?"style='pointer-events:none;' readonly":''?>>
                                                    <option value="null">Unset</option>
                                                    <?php foreach ($all_sessions as $session): ?>
                                                        <option value="<?=$session['sessions_id']?>" <?=(isset($sessions_edit->subsequent_session_1) && $sessions_edit->subsequent_session_1 == $session['sessions_id'])?'selected':''?>>(<?=$session['sessions_id']?>) <?=$session['session_title']?></option>
                                                    <?php endforeach; ?>
                                                </select>

                                                <small style="color: darkred;">If this is <span style="color: blue;">Unset</span>, nothing will happen once the <span style="color: green;">Redirect</span> button is clicked (Even if the <span style="color: #05969d;">Subsequent Session 2</span> is set!).</small>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-large" style="color: #05969d;">Subsequent Session 2</label>
                                                <select class="form-control" id="subsequent_session_2" name="subsequent_session_2" <?=($user_role != 'super_admin')?"style='pointer-events:none;' readonly":''?>>
                                                    <option value="null">Unset</option>
                                                    <?php foreach ($all_sessions as $session): ?>
                                                        <option value="<?=$session['sessions_id']?>" <?=(isset($sessions_edit->subsequent_session_2) && $sessions_edit->subsequent_session_2 == $session['sessions_id'])?'selected':''?>>(<?=$session['sessions_id']?>) <?=$session['session_title']?></option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <small style="color: darkred;">If this is <span style="color: blue;">Unset</span>, attendee will be automatically redirected to the <span style="color: #05969d;">Subsequent Session 1</span> once the <span style="color: green;">Redirect</span> button is clicked. Otherwise a window will pop-up asking the attendee where to go.</small>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="text-large">Text in the pop-up</label>
                                                <textarea class="form-control" id="subsequent_session_popup_text" name="subsequent_session_popup_text" maxlength="255" style="color: black;"><?=(isset($sessions_edit->subsequent_session_popup_text))?$sessions_edit->subsequent_session_popup_text:'This session is over. Click on the following buttons to attend one of the next sessions.'?></textarea>
                                            </div>
                                        </div>

                                    </div>

                                    <hr style="border: 2px solid;"/>

                                    <div class="row" <?=($user_role != 'super_admin')?'style="display:none"':''?>>
                                        <label class="col-md-12 text-large text-bold">Select Sessions Tracks</label>
                                        <?php
                                        if (isset($session_tracks) && !empty($session_tracks)) {
                                            foreach ($session_tracks as $val) {
                                                if ($val->sessions_tracks != "") {
                                                    ?>
                                                    <div class="form-group col-md-6" style="color: #000;">
                                                        <input type="checkbox" class="col-md-1"  name="sessions_tracks[]" <?= (isset($sessions_edit) && !empty($sessions_edit)) ? in_array($val->sessions_tracks_id, explode(",", $sessions_edit->sessions_tracks_id)) ? 'checked' : '' : '' ?> id="sessions_tracks" value="<?= $val->sessions_tracks_id ?>" <?=($user_role != 'super_admin')?"onclick='return false;' onkeydown='return false; readonly'":''?>> <?= $val->sessions_tracks ?><br>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="form-group" <?=($user_role != 'super_admin')?'style="display:none"':''?>>
                                        <label class="text-large text-bold">Select Sessions Status</label>
                                        <select class="form-control" id="sessions_type_status" name="sessions_type_status" <?=($user_role != 'super_admin')?"style='pointer-events:none;' readonly":''?>>
                                            <option <?= (isset($sessions_edit) && !empty($sessions_edit) ) ? ($sessions_edit->sessions_type_status == "Regular") ? "selected" : "" : "selected" ?> value="Regular">Regular Session</option>
                                            <option <?= (isset($sessions_edit) && !empty($sessions_edit) ) ? ($sessions_edit->sessions_type_status == "Private") ? "selected" : "" : "" ?> value="Private">Private Session</option>
                                        </select>
                                        <hr style="border: 2px solid;"/>
                                    </div>
                                    <?php if (isset($sessions_edit)) { ?>
                                        <div class="row">
                                            <label class="col-md-12 text-large text-bold">Tool Box</label>
                                            <div class="form-group col-md-6" style="color: #000;">
                                                <input type="radio" class="col-md-1"  name="tool_box_status"  id="tool_box" <?= (isset($sessions_edit) && !empty($sessions_edit)) ? ($sessions_edit->tool_box_status == "1") ? 'checked' : '' : 'checked' ?> value="1">ON<br>
                                            </div>
                                            <div class="form-group col-md-6" style="color: #000;">
                                                <input type="radio" class="col-md-1"  name="tool_box_status"  id="tool_box_2" <?= (isset($sessions_edit) && !empty($sessions_edit)) ? ($sessions_edit->tool_box_status == "0") ? 'checked' : '' : '' ?>  value="0">OFF<br>
                                            </div>
                                        </div>
                                    <?php } ?>
                                    <?php
                                    $right_bar=isset($sessions_edit->right_bar)?$sessions_edit->right_bar:"";
                                    ?>
                                    <div class="row">
                                        <label class="col-md-12 text-large text-bold">Tool Box Items</label>
                                        <div class="form-group col-md-12">
                                            <label class="checkbox-inline"><input type="checkbox" name="session_right_bar[]" <?=$right_bar?sessionRightBarControl($right_bar, "resources", "checked"):""?> value="resources">Resources</label>
                                            <label class="checkbox-inline"><input type="checkbox" name="session_right_bar[]" <?=$right_bar?sessionRightBarControl($right_bar, "chat", "checked"):""?> value="chat">Chat</label>
                                            <label class="checkbox-inline"><input type="checkbox" name="session_right_bar[]" <?=$right_bar?sessionRightBarControl($right_bar, "notes", "checked"):""?> value="notes">Notes</label>
                                            <label class="checkbox-inline"><input type="checkbox" name="session_right_bar[]" <?=$right_bar?sessionRightBarControl($right_bar, "questions", "checked"):""?> value="questions">Questions</label>
                                            <label class="checkbox-inline"><input type="checkbox" name="session_right_bar[]" <?=$right_bar?sessionRightBarControl($right_bar, "adminChat", "checked"):""?> value="adminChat">Admin Chat</label>
                                        </div>
                                    </div>

                                    <hr style="border: 2px solid;">
                                    <div class="form-group" style="position: unset !important;  <?=($user_role != 'super_admin')?'display:none':''?>">
                                        <label class="col-md-12 text-large text-bold">Sessions Photo</label>
                                        <input type="file" class="form-control" name="sessions_photo" id="sessions_photo" <?=($user_role != 'super_admin')?'disabled':''?>>
                                        <?php if (isset($sessions_edit)) {
                                            if ($sessions_edit->sessions_photo != "") {?>
                                                <div class="clearfix" style="height: 5px;"></div>
                                                <button data-sessions-id="<?= $sessions_edit->sessions_id ?>" class="btn btn-warning btn-sm delete-photo" id="sessions_photo" style="float:right">Delete</button><br>
                                            <?php }}?>
                                        <?php
                                        if (isset($sessions_edit)) {
                                            if ($sessions_edit->sessions_photo != "") {
                                                ?>
                                                <img src="<?= base_url() ?>uploads/sessions/<?= $sessions_edit->sessions_photo ?>" style="height: 100px; width: 100px;">
                                                <?php
                                            }
                                        }else{
                                            ?>
                                            <img src="<?= base_url() ?>uploads/sessions/sessions_82930456.jpg" style="height: 100px; width: 100px;">
                                            <?php
                                        }
                                        ?>
                                        <hr style="border: 2px solid;">
                                    </div>
                                    <div class="row">
                                        <label class="col-md-12 text-large text-bold">Claim Credit Link</label>
                                        <div class="form-group col-md-6" style="color: #000;">
                                            <input type="radio" class="col-md-1"  name="attendee_view_links_status"  id="attendee_view_links" <?= (isset($sessions_edit) && !empty($sessions_edit)) ? ($sessions_edit->attendee_view_links_status == "1") ? 'checked' : '' : '' ?> value="1">ON<br>
                                        </div>
                                        <div class="form-group col-md-6" style="color: #000;">
                                            <input type="radio" class="col-md-1"  name="attendee_view_links_status"  id="attendee_view_links_2" <?= (isset($sessions_edit) && !empty($sessions_edit)) ? ($sessions_edit->attendee_view_links_status == "0") ? 'checked' : '' : 'checked' ?>  value="0">OFF<br>
                                        </div>
                                        <div class="col-md-12" id="url_section">
                                            <div class="form-group">
                                                <label class="text-large text-bold">Claim URL (URL must be prefixed with http:// or https://)</label>
                                                <input type="text" name="url_link" id="url_link" value="<?= (isset($sessions_edit) && !empty($sessions_edit) ) ? $sessions_edit->url_link : "" ?>" class="form-control" placeholder="URL Link">
                                            </div>
                                            <div class="form-group">
                                                <label class="text-large text-bold">Link Text</label>
                                                <input type="text" name="link_text" id="link_text" value="<?= (isset($sessions_edit) && !empty($sessions_edit) ) ? $sessions_edit->link_text : "" ?>" class="form-control" placeholder="Link Text">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="position: unset !important; <?=($user_role != 'super_admin')?'display:none':''?>" >
                                        <hr style="border: 2px solid;">
                                        <label class="col-md-12 text-large text-bold">Sponsor Logo &nbsp; (uploaded logo is displayed on right side of client logo in attendee view)</label>
                                        <input type="file" class="form-control" name="sessions_logo" id="sessions_logo" <?=($user_role != 'super_admin')?'disabled':''?>>
                                        <?php if (isset($sessions_edit)) {
                                            if ($sessions_edit->sessions_logo != "") { ?>
                                                <div class="clearfix" style="height: 5px;"></div>
                                                <button data-sessions-id="<?= $sessions_edit->sessions_id ?>" class="btn btn-warning btn-sm delete-photo" id="sessions_logo" style="float:right">Delete</button><br>
                                            <?php }}?>
                                        <?php
                                        if (isset($sessions_edit)) {
                                            if ($sessions_edit->sessions_logo != "") {
                                                ?>
                                                <img src="<?= base_url() ?>uploads/sessions_logo/<?= $sessions_edit->sessions_logo ?>" style="object-fit: contain;height: 100px; width: 100px;">
                                                <?php
                                            }
                                        }
                                        ?>
                                        <div class="clearfix" style="height: 5px;"></div>
                                        <span style="color: blue;">Width: </span><input type="number" class="form-control-sm" style="color: #000;" name="sessions_logo_width" id="sessions_logo_width" value="<?= (isset($sessions_edit) && !empty($sessions_edit) ) ? $sessions_edit->sessions_logo_width : "" ?>" <?=($user_role != 'super_admin')?'readonly':''?>><span style="color: blue;">(pixels)</span>&nbsp;&nbsp;&nbsp;
                                        <span style="color: red;">Height: </span><input type="number" class="form-control-sm" style="color: #000;" name="sessions_logo_height" id="sessions_logo_height" value="<?= (isset($sessions_edit) && !empty($sessions_edit) ) ? $sessions_edit->sessions_logo_height : "" ?>" <?=($user_role != 'super_admin')?'readonly':''?>><span style="color: red;">(pixels)</span>
                                    </div>

                                    <div class="row" style="margin-top: 20px; <?=($user_role != 'super_admin')?'display:none':''?>">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <label class="col-md-12 text-large text-bold" for="sel1">Select Sponsor Text &nbsp;(this text will appear above the Sponsor logo)</label>

                                                <select class="form-control" name="sponsor_type" <?=($user_role != 'super_admin')?"style='pointer-events:none;' readonly":''?>>
                                                    <option value="" <?=isset($sessions_edit)?($sessions_edit->sponsor_type==""?"selected":""):""?>>___No Text___</option>
                                                    <option value="SPONSORED BY" <?=isset($sessions_edit)?($sessions_edit->sponsor_type=="SPONSORED BY"?"selected":""):""?>>SPONSORED BY</option>
                                                    <option value="EDUCATED BY" <?=isset($sessions_edit)?($sessions_edit->sponsor_type=="EDUCATED BY"?"selected":""):""?>>EDUCATED BY</option>
                                                    <option value="PARTNERING WITH" <?=isset($sessions_edit)?($sessions_edit->sponsor_type=="PARTNERING WITH"?"selected":""):""?>>PARTNERING WITH</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group" style="position: unset !important; <?=($user_role != 'super_admin')?'display:none':''?>" >
                                        <hr style="border: 2px solid;">
                                        <label class="col-md-12 text-large text-bold">Additional Logo &nbsp;(uploaded logo is displayed on LEFT side of client logo in attendee view)</label>
                                        <input type="file" class="form-control" name="sessions_addnl_logo" id="sessions_addnl_logo" <?=($user_role != 'super_admin')?'disabled':''?>>
                                        <?php if (isset($sessions_edit->sessions_addnl_logo)) {
                                            if ($sessions_edit->sessions_addnl_logo != "") {?>
                                                <div class="clearfix" style="height: 5px;"></div>
                                                <button data-sessions-id="<?= $sessions_edit->sessions_id ?>" class="btn btn-warning btn-sm delete-photo" id="sessions_addnl_logo" style="float:right">Delete</button>
                                            <?php }}?>
                                        <?php
                                        if (isset($sessions_edit->sessions_addnl_logo)) {
                                            if ($sessions_edit->sessions_addnl_logo != "") {
                                                ?>
                                                <img src="<?= base_url() ?>uploads/sessions_logo/<?= $sessions_edit->sessions_addnl_logo ?>" style="object-fit: contain;height: 100px; width: 100px;">
                                                <?php
                                            }
                                        }
                                        ?>
                                        <div class="clearfix" style="height: 5px;"></div><br>
                                    </div>

                                    <div class="form-group">
                                        <h5 class="over-title margin-bottom-15" style="text-align: center;">
                                            <button type="submit" id="btn_sessions" name="btn_sessions" class="btn btn-green add-row">Submit</button>
                                        </h5>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="panel panel-primary">
                            <div class="panel-heading">
                                <h3 class="panel-title text-bold">Presenters</h3>
                            </div>
                            <div class="panel-body bg-white" style="border: 1px solid #b2b7bb!important;">
                                <?php if (isset($sessions_edit)) { ?>
                                <div class="" id="presenter_list">
                                    <?php } else { ?>
                                    <div class="row" id="presenter_list">
                                        <?php } ?>
                                        <?php
                                        if (isset($sessions_edit)) {
                                            if (isset($sessions_edit->sessions_presenter) && !empty($sessions_edit->sessions_presenter)) {
                                                foreach ($sessions_edit->sessions_presenter as $value) {
                                                    ?>
                                                    <div class='col-md-12' id='add_new_presenter_section' style='margin-bottom: 20px; padding: 10px; border: 1px solid #b2b7bb;'>
                                                        <input type="hidden" name="status[]" value="update">
                                                        <input type="hidden" name="sessions_add_presenter_id[]" value="<?= $value->sessions_add_presenter_id ?>">
                                                        <div class='col-md-12'>
                                                            <div class='col-md-6'>
                                                                <div class='form-group'>
                                                                    <label class='text-large'>Order No.:</label>
                                                                    <input type='text' name='order_no[]' id='presenter_order_no' placeholder='Order No.' value='<?= $value->order_index_no ?>' class='form-control'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-6'>
                                                                <div class='form-group'>
                                                                    <label class='text-large'>Presenter:</label>
                                                                    <select class='form-control select_presenter_id' id='select_presenter_id' name='select_presenter_id[]'>
                                                                        <option selected='' value=''>Select Presenter</option>
                                                                        <?php
                                                                        if (isset($presenter) && !empty($presenter)) {
                                                                            foreach ($presenter as $val) {
                                                                                ?>
                                                                                <option value = '<?= $val->presenter_id ?>' <?= ($val->presenter_id == $value->select_presenter_id) ? "selected" : "" ?> ><?= $val->presenter_name ?> </option>
                                                                                <?php
                                                                            }
                                                                        }
                                                                        ?>
                                                                    </select>
                                                                </div>
                                                            </div>

                                                            <div class='col-md-6'>
                                                                <div class='form-group'>
                                                                    <label class='text-large' > Title: </label>
                                                                    <input type ='text' name='presenter_title[]' placeholder= 'Title' id='presenter_title' value='<?= $value->presenter_title ?>' class='form-control'>
                                                                </div>
                                                            </div>
                                                            <div class='col-md-6'>
                                                                <div class = 'form-group'>
                                                                    <label class='text-large'> Presenter Start Time: </label>
                                                                    <input type='text' name='presenter_time_slot[]' placeholder='Presenter Start Time' id='presenter_time_slot' placeholder='Ex: 7:00 - 7:10' value='<?= $value->presenter_time_slot ?>' class='form-control'>
                                                                </div>
                                                            </div>

                                                            <?php if (1==1) { ?>
                                                                <div class='col-md-6' style="display: none">
                                                                    <div class='form-group'>
                                                                        <label class='text-large'>Upload published name:</label>
                                                                        <input type='text' name='upload_published_name[]' id='upload_published_name' value='<?= $value->upload_published_name ?>'  placeholder='Enter Upload Published Name' class='form-control'>
                                                                    </div>
                                                                    <div class ='form-group'>
                                                                        <label> Resources Uploads</label>
                                                                        <input type ='file' class='form-control' name='presenter_resource[]' id='presenter_resource'>
                                                                        <img src="<?= base_url() ?>uploads/presenter_resource/<?= $value->presenter_resource ?>" style="height: 100px; width: 100px;">
                                                                    </div>
                                                                </div>
                                                                <div class='col-md-6' style="display: none">
                                                                    <div class='form-group'>
                                                                        <label class='text-large'>Link published name:</label>
                                                                        <input type='text' name='link_published_name[]' id='link_published_name' value='<?= $value->link_published_name ?>'  placeholder='Enter Upload Published Name' class='form-control'>
                                                                    </div>
                                                                    <div class='form-group'>
                                                                        <label class='text-large' >Resources Links: </label>
                                                                        <input type='text' name='presenter_resource_link[]' placeholder='Resource Link' id='presenter_resource_link' value = '<?= $value->presenter_resource_link ?>' class='form-control'>
                                                                    </div>
                                                                </div>
                                                            <?php } ?>
                                                            <div class='col-md-12'>
                                                                <div class="form-group">
                                                                    <button type="button" class="btn btn-danger btn-o next-step btn-wide btn_remove_presenter" data-sessions_add_presenter_id="<?= $value->sessions_add_presenter_id ?>" id="btn_remove_presenter">
                                                                        <i class="fa fa-minus"></i>  Remove Presenter
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php
                                                }
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="row">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary btn-o next-step btn-wide" id="btn_add_new_presenter">
                                                <i class="fa fa-plus"></i>  Add New Presenter
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function () {

        $('input[readonly]').on('click', function () {
            alertify.error("You are not authorized to edit this field!");
        });


        $('.datepicker').datepicker({dateFormat: 'mm/dd/yyyy'});
        $("#btn_add_new_presenter").on("click", function () {
            $("#presenter_list").append("<div class='p-15' id='add_new_presenter_section' style='margin-bottom: 20px; padding: 10px; border: 1px solid #b2b7bb;'>\n\
                                        <div class='row'><input type='hidden' name='status[]' value='insert'><div class='col-md-6'><div class='form-group'>\n\
                                            <label class='text-large'>Order No.:</label>\n\
                                            <input type='text' name='order_no[]' id='presenter_order_no' placeholder='Order No.' value='' class='form-control'>\n\
                                        </div></div>\n\
                                        <div class='col-md-6'><div class='form-group'>\n\
                                            <label class='text-large'>Presenter:</label>\n\
                                            <select class='form-control select_presenter_id' id='select_presenter_id' name='select_presenter_id[]'>\n\
                                                <option selected='' value=''>Select Presenter</option>\n\
                                                \n\<?php if (isset($presenter) && !empty($presenter)) {
                foreach ($presenter as $val) {
                ?>
                                                    <option value='<?= $val->presenter_id ?>'><?= $val->presenter_name ?></option>\n\
                                                    <?php } }?></select>\n\
                                        </div></div></div>\n\
                                        <div class='row'><div class='col-md-6'><div class='form-group'>\n\
                                            <label class='text-large'>Title:</label>\n\
                                            <input type='text' name='presenter_title[]' placeholder='Title' id='presenter_title' value='' class='form-control'>\n\
                                        </div></div>\n\
                                         <div class='col-md-6'><div class='form-group'>\n\
                                            <label class='text-large'>Presenter Start Time:</label>\n\
                                            <input type='text' name='presenter_time_slot[]' placeholder='Presenter Start Time' id='presenter_time_slot' placeholder='Ex: 7:00 - 7:10' value='' class='form-control'>\n\
                                        </div></div></div>\n\
                                        <div class='row'><div class='col-md-6'>\n\
                                         <div class='form-group'>\n\
                                                                <label class='text-large'>Upload published name:</label>\n\
                                                                <input type='text' name='upload_published_name[]' id='upload_published_name'  placeholder='Enter Upload Published Name' class='form-control'>\n\
                                                            </div>\n\
                                         <div class='form-group'>\n\
                                            <label>Resource Uploads</label>\n\
                                            <input type='file' class='form-control' name='presenter_resource[]' id='presenter_resource'>\n\
                                        </div></div>\n\
                                        <div class='col-md-6'>\n\
                                         <div class='form-group'>\n\
                                                                <label class='text-large'>Link published name:</label>\n\
                                                                <input type='text' name='link_published_name[]' id='link_published_name'  placeholder='Enter Upload Published Name' class='form-control'>\n\
                                                            </div>\n\
<div class='form-group'>\n\
                                            <label class='text-large'>Resource Links:</label>\n\
                                            <input type='text' name='presenter_resource_link[]' placeholder='Resource Link' id='presenter_resource_link' value='' class='form-control'>\n\
                                        </div></div></div>\n\
                                    </div>");
        });

        $("#btn_sessions").on("click", function () {
                var sum = 0;
                $(".select_presenter_id").each(function () {
                    sum += 1;
                });
                if ($("#session_title").val() == "") {
                    alertify.error("Enter Sessions Title");
                    return false;
                } else if ($("#sessions_date").val() == "") {
                    alertify.error("Select Date");
                    return false;
                } else if ($("#time_slot").val() == "") {
                    alertify.error("Enter Time Slot");
                    return false;
                } else if (sum > 15) {
                    alertify.error("Maximum add 15 Presenter");
                    return false;
                } else if ($('#attendee_view_links').is(':checked')) {
                    if ($('#link_text').val() == '') {
                        alertify.error("Claim Credit Link Empty");
                        return false;
                    } else {
                        return true;
                    }
                }else{
                    return true;
                }
                return false;
            }
        );

        $(document).on("click", ".btn_remove_presenter", function () {
            var sessions_add_presenter_id = $(this).attr("data-sessions_add_presenter_id");
            $.ajax({
                url: "<?= base_url() ?>admin/sessions/remove_presenter_by_session",
                type: "post",
                data: {'sessions_add_presenter_id': sessions_add_presenter_id, 'sessions_id': $("#sessions_id").val()},
                dataType: "json",
                success: function (data) {
                    if (data.status == "success") {
                        location.reload();
                    }
                }
            });
        });


        $('#themeColor').on("change paste keyup", function () {
            let hex = $(this).val();
            $('#themeColorHex').val('#' + hex);
        });

        $('#themeColorHex').on("change paste keyup", function () {
            let hex = ($(this).val()).replace('#', '');
            $('#themeColor').val(hex.toUpperCase());
        });


        //====== session ALL Photo delete =======//
        $('.delete-session-photo').on("click", function (event) {
            event.preventDefault()
            var sesionId = $(this).attr("data-sessions-id");
            console.log(sesionId);
            alertify.confirm('Delete All Sessions Photo', 'This will delete all photo in this session', function (e) {
                if (e) {

                    $.post("<?= base_url() ?>admin/sessions/delete_all_session_photos/" + sesionId, function (response) {
                        console.log(response);
                        if (response == "success") {
                            alertify.success('Session Photos Deleted!');
                            window.setTimeout('location.reload()', 2000);
                        } else {
                            alertify.success('No Session Photo to Delete!');
                            window.setTimeout('location.reload()', 2000);
                        }
                    });
                }
            }, function () {
            });
        });

        $('.delete-photo').on("click", function (event) {
            event.preventDefault()
            var sesionId = $(this).attr("data-sessions-id");
            var session_loc = this.id;

            alertify.confirm('Are you sure?', 'This will delete photo in this session', function (e) {
                if (e) {
                    $.post("<?= base_url() ?>admin/sessions/delete_session_logo/", {
                        session_id: sesionId,
                        session_loc: session_loc
                    }, function (response) {
                        if (response == "success") {
                            alertify.success('Session Photo Deleted!');
                            window.setTimeout('location.reload()', 2000);
                        } else {
                            alertify.success('No Session Photo to Delete!');
                            window.setTimeout('location.reload()', 2000);
                        }
                    });
                }
            }, function () {
            });
        });


        $('#subsequent_session_popup_text').on('keypress', function (e) {
            var ingnore_key_codes = [34, 39];
            if ($.inArray(e.which, ingnore_key_codes) >= 0) {
                e.preventDefault();
                alertify.error('No single quotes or double quotes allowed!');
            }
        });

    });
</script>
