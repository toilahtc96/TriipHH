<div id="myModal{{$room->id}}" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Đặt phòng hạng <span id="level">{{$room->level}} </span> của khách sạn
                        {{$hotel->hotel_name}}
                    </h4>
                </div>
                <div class="modal-body">

                    <div class="tab-content">
                        <div class="tab-content-inner active" data-content="signup" style="padding:0 10% 0 10%">

                            <form action="#">
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="fullname">Tên của bạn</label>
                                        <input type="text" id="fullname" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="activities">Số điện thoại</label>
                                        <input type="text" id="msisdn" class="form-control">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="fb-link">Facebook</label>
                                        <input type="text" name="fb-link" class="form-control" />
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="start-date">Ngày đi</label>
                                        <input type="date" name="start-date" class="form-control" />
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-6">
                                        <label for="date-start">Người lớn</label>
                                        <select name="audust" id="audust" class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="date-start">Trẻ em</label>
                                        <select name="children" id="children" class="form-control">
                                            <option value="1">1</option>
                                            <option value="2">2</option>
                                            <option value="3">3</option>
                                            <option value="4">4</option>
                                            <option value="5">5</option>
                                            <option value="6">6</option>
                                            <option value="7">7</option>
                                            <option value="8">8</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <label for="fb-link">Bạn muốn tư vấn tại?</label><br>
                                        <label class="checkbox-inline"><input type="radio" name="type_service"
                                                value="fb">
                                            Facebook</label>
                                        <label class="checkbox-inline"><input type="radio" name="type_service"
                                                value="msisdn"> Số điện thoại</label>
                                        <label class="checkbox-inline"><input type="radio" name="type_service"
                                                value="zalo">
                                            Zalo</label>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-md-12">
                                        <input type="submit" class="btn btn-primary btn-block" value="Submit">
                                    </div>
                                </div>
                            </form>

                        </div>


                    </div>

                </div>
                <div class="modal-footer" style="text-align:center">
                 Chân thành cảm ơn bạn đã tin tưởng chúng tôi!
                </div>
            </div>

        </div>
    </div>