<div class="modal fade" id="addNewEvent" tabindex="-1" role="dialog" aria-labelledby="addNewEventTitle" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form method="POST" autocomplete="off" action="/events/add">
                @csrf
                <input autocomplete="off" name="hidden" type="text" style="display:none;">
                <div class="modal-header">
                <h5 class="modal-title" id="addNewEventTitle">Add New Event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="form-group">
                    <input class="form-control" name="name" type="text" placeholder="Give A Name For Your Event">
                </div>
                <div class="form-group">
                    <input class="form-control" name="description" type="text" placeholder="Description">
                </div>
                <div class="form-group">
                    <select class="form-control" name="eventType" aria-label="Default select example">
                        <option value="0" selected>Event Type</option>
                        <option value="1"><i class="fas fa-birthday-cake"></i> Birthday</option>
                        <option value="2"><i class="fas fa-ticket-alt"></i> Movie</option>
                        <option value="3"><i class="fas fa-calendar-day"></i> Other</option>
                    </select>
                </div>

                <div class="form-row">
                    <div class="col">
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="checkbox" name="allDay" id="allDay">
                            <label class="form-check-label" for="allDay">
                                All Day?
                            </label>
                        </div>
                    </div>
                    <div class="col">
                        <select class="form-control" aria-label="Default select example">
                            <option value="0" selected>Recurring: Off</option>
                            <option value="1">Every Day</option>
                            <option value="2">Every Week</option>
                            <option value="3">Every Month</option>
                            <option value="4">Every Year</option>
                        </select>
                    </div>
                </div>

                <div class="form-group">
                    <label for="startDate">Start Date: </label>
                    <div class="row">
                        <div class="col-8">
                            <input class="form-control" name="startDate" type="date">
                        </div>
                        <div class="col-4">
                            <input class="form-control" id="startTime" name="startTime" type="time" placeholder="pick time"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="startDate">End Date: </label>
                    <div class="row">
                        <div class="col-8">
                            <input class="form-control" name="endDate" type="date">
                        </div>
                        <div class="col-4">
                            <input class="form-control" id="endTime"  name="endTime" type="time" placeholder="pick time"/>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <label for="startDate">Remind Me On:</label>
                    <div class="row">
                        <div class="col-8">
                            <input name="reminderDate" class="form-control" type="date">
                        </div>
                        <div class="col-4">
                            <input class="form-control" name="reminderTime" type="time" placeholder="pick time"/>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control" name="location" type="text" placeholder="Location">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
            </form>
        </div>
    </div>
</div>
<script>
    $("#allDay").click(function() {
        if($(this).is(":checked")) // "this" refers to the element that fired the event
        {
            $('#startTime').hide();
            $('#endTime').hide();
        }else{
            $('#startTime').show();
            $('#endTime').show();
        }
    });
</script>
