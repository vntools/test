//Show modal 
$(window).load(function () {
    $('#isTestModal').modal('show');
});


/*----------------- Group question -------------------*/

//Get list groups question
var getGroupList = function () {
    var class_group = $('#class_group').val();
    $.ajax({
        type: 'post',
        url: 'group/get-list',
        data: {
            '_token': $('input[name=_token]').val(),
            'class': class_group,
        },
        success: function (groups) {
            var data = '';
            if (groups.length > 0) {
                data += '<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"cellspacing="0" width="100%">';
                data += '<thead><tr>';
                data += '<th># ID</th>';
                data += '<th>Tên bộ câu hỏi</th>';
                data += '<th>Ngày thêm</th>';
                data += '<th>Thao tác</th>';
                data += '</tr></thead>';
                data += '<tbody>';
                $.each(groups, function (key, value) {
                    data += '<tr>';
                    data += '<td>' + value.id + '</td>';
                    data += '<td>' + value.group_name + '</td>';
                    data += '<td>' + value.created_at + '</td>';
                    data += '<td><span class="edit_group_question" data-id="' + value.id + '" data-group_name="' + value.group_name + '" data-class="' + value.class + 
                    '"><span class="glyphicon glyphicon-edit"></span> Sửa</span> | <span class="delete_group" data-id="'+value.id 
                    +'" onclick="return confirm(\'Xóa bộ câu hỏi sẽ xóa tất cả câu hỏi có trong bộ, xác nhận xóa?\')"><span class="glyphicon glyphicon-trash"></span> Xóa</span></td>';
                    data += '</tr>';
                });
                data += '</tbody>';
                data += '</table>';

            } else {
                data = 'Không có dữ liệu để hiển thị';
            }

            $('#list_group').html(data);
        },
        eror: function (groups) {
            var data = "Có lỗi, vui lòng thực hiện lại";
            $('#list_group').html(data);
        }
    });
};

$(document).on('click', '#show_list_group', getGroupList);
$(document).on('change', '#class_group', getGroupList);

//Get list group questions
$(document).on('change', '#question_class', function () {
    var question_class = $('#question_class').val();
    var url = $(this).data('url');
    $('#list_question').html('');
    $.ajax({
        type: 'post',
        url: url,
        data: {
            '_token': $('input[name=_token]').val(),
            'class': question_class,
        },
        success: function (groups) {
            var data = '';
            if (groups.length > 0) {
                $.each(groups, function (key, value) {
                    data += '<option value="' + value.id + '">' + value.group_name + '</option>';
                });
            }
            $('#group_id').html(data);
        },
        error: function () {}
    });
});

// Show model edit group question 
$(document).on('click', '.edit_group_question', function() {
    $('#footer_action_button').text(" Update");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit_group');
    $('.modal-title').text('Edit');
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#fgroup_name').val($(this).data('group_name'));
    var qclass = $(this).data('class');
    $("#fclass").val(qclass).attr("selected", "selected");
    $('#myModal').modal('show');
});

// Function update group question
$('.modal-footer').on('click', '.edit_group', function() {
    $.ajax({
        type: 'post',
        url: 'group/edit',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $("#fid").val(),
            'group_name': $('#fgroup_name').val(),
            'class': $('#fclass').val(),
        },
        success: getGroupList,
        error: function() {
            console.log('error');
            alert('Không thể cập nhật');
        },
    });
});

//Delete group qeuestion 
$(document).on('click', '.delete_group', function() {
    $.ajax({
        type: 'post',
        url: 'group/delete',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).data('id'),
        },
        success: getGroupList,
        error: function() {
            console.log('error');
            alert('Có lỗi, vui lòng thử lại sau');
        },
    });
});


/*-------------- Question ----------------------*/

// Details question
$(document).on('click', '.question-des', function () {
    var problem = $(this).data('problem');
    var answer1 = $(this).data('answer1');
    var answer2 = $(this).data('answer2');
    var answer3 = $(this).data('answer3');
    var answer4 = $(this).data('answer4');
    var correct = $(this).data('correct');
    var explain = $(this).data('explain');
    var level = $(this).data('level');
    if (level == '1') level = 'Dễ';
    else if (level == '2') level = 'Trung bình';
    else if (level == '3') level = 'Khó';
    else level = '-';
    var group_name = $(this).data('group_name');
    var created_at = $(this).data('created_at');
    var data = "<p><b>Câu hỏi:</b> " + problem + "</p>";
    data += "<p><b>Đáp án A:</b> " + answer1 + "</p>";
    data += "<p><b>Đáp án B:</b> " + answer2 + "</p>";
    data += "<p><b>Đáp án C:</b> " + answer3 + "</p>";
    data += "<p><b>Đáp án D:</b> " + answer4 + "</p>";
    data += "<hr>";
    data += "<p><b>Đáp án đúng:</b> " + correct.toUpperCase() + "</p>";
    data += "<p><b>Độ khó:</b> " + level + "</p>";
    data += "<p><b>Lời giải:</b> " + explain + "</p>";
    data += "<hr>";
    data += "<p><b>Bộ câu hỏi:</b> " + group_name + "</p>";
    data += "<p><b>Ngày thêm:</b> " + created_at + "</p>";
    $('#des-content').html(data);
    $('#desModel').modal('show');
});

//Get list question to id group
//$(document).on('click', '#show_list_question', function() {
var getQuestionList = function () {
    var group_id = $('#group_id').val();
    $.ajax({
        type: 'post',
        url: 'question/get-list',
        data: {
            '_token': $('input[name=_token]').val(),
            'group_id': group_id,
        },
        success: function (questions) {
            var data = '';
            if (questions.length > 0) {
                data += '<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"cellspacing="0" width="100%">';
                data += '<thead><tr>';
                data += '<th># ID</th>';
                data += '<th>Câu hỏi</th>';
                data += '<th>Độ khó</th>'
                data += '<th>Ngày thêm</th>';
                data += '<th>Thao tác</th>';
                data += '</tr></thead>';
                data += '<tbody>';
                $.each(questions, function (key, value) {
                    //var date_test = new Date(value.created_at.replace(/-/g,"/"));
                    var level = value.level;
                    if (level == '1') level = 'Dễ';
                    else if (level == '2') level = 'Trung bình';
                    else if (level == '3') level = 'Khó';
                    else level = '-';
                    data += '<tr>';
                    data += '<td>' + value.id + '</td>';
                    data += '<td>' + value.problem + '</td>';
                    data += '<td>' + level + '</td>';
                    data += '<td>' + value.created_at + '</td>';
                    data += "<td><span class='question-des detail-pointer' data-problem='" + value.problem + "' data-answer1='" + value.answer1 + "'" +
                        "data-answer2='" + value.answer2 + "' data-answer3='" + value.answer3 + "'" +
                        "data-answer4='" + value.answer4 + "' data-correct='" + value.correct + "'" +
                        "data-explain='" + value.explain + "' data-level='" + value.level + "' data-group_name='" + value.group_name + "'" +
                        "data-created_at='" + value.created_at + "'><span class='glyphicon glyphicon-list-alt'></span> Chi tiết</span> | <a href='question/edit/" + 
                        value.id + "'><span class='glyphicon glyphicon-edit'></span> Sửa</a></span> | <span class='delete_question detail-pointer' data-id='" + value.id +
                        "' onclick='return confirm(\"Bạn có chắc chắn muốn xóa không, xác nhận xóa?\")'><span class='glyphicon glyphicon-trash'></span> Xóa</span></td>";
                    data += '</tr>';
                });
                data += '</tbody></table>';
            } else {
                data = 'Không có dữ liệu để hiển thị';
            }
            $('#list_question').html(data);
        },
        error: function () {}
    });
};
$(document).on('click', '#show_list_question', getQuestionList);
$(document).on('change', '#group_id', getQuestionList);

//Delete qeuestion 
$(document).on('click', '.delete_question', function() {
    $.ajax({
        type: 'post',
        url: 'question/delete',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).data('id'),
        },
        success: getQuestionList,
        error: function() {
            console.log('error');
            alert('Có lỗi, vui lòng thử lại sau');
        },
    });
});

/*------------------------- Topic ----------------------*/

//Get list topics
var getTopicList = function () {
    var class_topic = $('#class_topic').val();
    $.ajax({
        type: 'post',
        url: 'topic/get-list',
        data: {
            '_token': $('input[name=_token]').val(),
            'class': class_topic,
        },
        success: function (topics) {
            var data = '';
            if (topics.length > 0) {
                data += '<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"cellspacing="0" width="100%">';
                data += '<thead><tr>';
                data += '<th># ID</th>';
                data += '<th>Tên bộ đề thi</th>';
                data += '<th>Ngày thêm</th>';
                data += '<th>Thao tác</th>';
                data += '</tr></thead>';
                data += '<tbody>';
                $.each(topics, function (key, value) {
                    data += '<tr>';
                    data += '<td>' + value.id + '</td>';
                    data += '<td>' + value.topic_name + '</td>';
                    data += '<td>' + value.created_at + '</td>';
                    data += '<td><span class="edit_topic_question detail-pointer" data-id="'+value.id+
                    '" data-topic_name="'+value.topic_name+'" data-class="'+value.class+'"><span class="glyphicon glyphicon-edit"></span> Sửa</span> | <span class="delete_topic detail-pointer" data-id="' + value.id + 
                    '" onclick="return confirm(\'Xóa chủ đề sẽ xóa tất cả đề thi có trong chủ đề, xác nhận xóa?\')"><span class="glyphicon glyphicon-trash"></span> Xóa</span></td>';
                    data += '</tr>';
                });
                data += '</tbody></table>';

            } else {
                data = 'Không có dữ liệu để hiển thị';
            }

            $('#list_topic').html(data);
        },
        eror: function (topics) {
            var data = "Có lỗi, vui lòng thực hiện lại";
            $('#list_topic').html(data);
        }
    });
};

$(document).on('click', '#show_list_topic', getTopicList);
$(document).on('change', '#class_topic', getTopicList);

//Get list topics in add test
$(document).on('change', '#topic_class', function () {
    var topic_class = $('#topic_class').val();
    var url = $(this).data('url');

    $('#list_test').html('');
    $.ajax({
        type: 'post',
        url: url,
        data: {
            '_token': $('input[name=_token]').val(),
            'class': topic_class,
        },
        success: function (topics) {
            var data = '';
            if (topics.length > 0) {
                data += '<option value="all">Tất cả</option>';
                $.each(topics, function (key, value) {
                    data += '<option value="' + value.id + '">' + value.topic_name + '</option>';
                });
            }
            $('#topic_id').html(data);
        },
        error: function () {}
    });
    var url2 = $('#group_checkbox').data('url');
    $.ajax({
        type: 'post',
        url: url2,
        data: {
            '_token': $('input[name=_token]').val(),
            'class': topic_class,
        },
        success: function (groups) {
            var data = '';
            if (groups.length > 0) {
                $.each(groups, function (key, value) {
                    data += '&nbsp;&nbsp;&nbsp;<input type="checkbox" name="group[]" value="' + value.id + '">' + value.group_name + '<br/>';
                });
            }
            $('#group_checkbox').html(data);
        },
        error: function () {}
    });
});

// Show model edit topic test 
$(document).on('click', '.edit_topic_question', function() {
    $('#footer_action_button').text(" Update");
    $('#footer_action_button').addClass('glyphicon-check');
    $('#footer_action_button').removeClass('glyphicon-trash');
    $('.actionBtn').addClass('btn-success');
    $('.actionBtn').removeClass('btn-danger');
    $('.actionBtn').addClass('edit_topic');
    $('.modal-title').text('Edit');
    $('.form-horizontal').show();
    $('#fid').val($(this).data('id'));
    $('#ftopic_name').val($(this).data('topic_name'));
    var tclass = $(this).data('class');
    $("#fclass").val(tclass).attr("selected", "selected");
    $('#myModal').modal('show');
});

// Function update topic test
$('.modal-footer').on('click', '.edit_topic', function() {
    $.ajax({
        type: 'post',
        url: 'topic/edit',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $("#fid").val(),
            'topic_name': $('#ftopic_name').val(),
            'class': $('#fclass').val(),
        },
        success: getTopicList,
        error: function() {
            console.log('error');
            alert('Không thể cập nhật');
        },
    });
});

//Delete topic test 
$(document).on('click', '.delete_topic', function() {
    $.ajax({
        type: 'post',
        url: 'topic/delete',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).data('id'),
        },
        success: getTopicList,
        error: function() {
            console.log('error');
            alert('Có lỗi, vui lòng thử lại sau');
        },
    });
});
/*----------------------------- Test --------------------------*/

// Details test
$(document).on('click', '.test-des', function () {
    var test_name = $(this).data('test_name');
    var secret_key = $(this).data('secret_key');
    var is_required = $(this).data('is_required');
    var note = $(this).data('note');
    var created_at = $(this).data('created_at');
    if (is_required == 0) type = 'Ôn tập'; else type = 'Thi';
    var data = "<p><b>Đề thi:</b> " + test_name + "</p>";
    data += "<p><b>Mật khẩu đề:</b> " + secret_key + "</p>";
    data += "<p><b>Loại đề:</b> " + type + "</p>";
    data += "<p><b>Ghi chú:<br/></b> " + note + "</p>";
    data += "<hr>";
    //data += "<p><b>Bộ câu hỏi:</b> " + group_name + "</p>";
    data += "<p><b>Ngày thêm:</b> " + created_at + "</p>";
    $('#des-content').html(data);
    $('#desModel').modal('show');
});

//Get list test from topic_id
var getTestList = function () {
    var topic_id = $('#topic_id').val();
    var topic_class = $('#topic_class').val();
    $.ajax({
        type: 'post',
        url: 'test/get-list',
        data: {
            '_token': $('input[name=_token]').val(),
            'topic_id': topic_id,
            'topic_class': topic_class
        },
        success: function (tests) {
            var data = '';
            if (tests.length > 0) {
                data += '<table id="datatable-responsive" class="table table-striped table-bordered dt-responsive nowrap"cellspacing="0" width="100%">';
                data += '<thead><tr>';
                data += '<th># ID</th>';
                data += '<th>Tên đề thi</th>';
                data += '<th>Câu hỏi / Thời gian</th>';
                data += '<th>Loại đề</th>';
                data += '<th>Mật khẩu đề thi</th>';
                data += '<th>Thao tác</th>';
                data += '</tr></thead>';
                data += '<tbody>';
                $.each(tests, function (key, value) {
                    data += '<tr>';
                    data += '<td>' + value.id + '</td>';
                    data += '<td>' + value.test_name + '</td>';
                    data += '<td>' + value.number_question + ' / ' + value.time_limit + '</td>';
                    if (value.is_required == 0) type = 'Ôn tập'; else type = 'Thi';
                    data += '<td>'+type+'</td>';
                    data += '<td>' + value.secret_key + '</td>';
                    data += '<td><span class="test-des detail-pointer" data-test_name="' + value.test_name + '" data-secret_key="' + value.secret_key + '"' +
                        'data-is_required="' + value.is_required + '" data-note="' + value.note + '" data-created_at="' + value.created_at + 
                        '">Chi tiết</span> | <a href="#"><span class="glyphicon glyphicon-edit"></span> Sửa</a> | <span class="disable_test detail-pointer" data-id="' + value.id +
                        '" data-status="0" onclick="return confirm(\'Đề thi này sẽ không hiển thị nữa?\')">Khóa</span> | <span class="delete_test detail-pointer" data-id="' + value.id +
                        '" onclick="return confirm(\'Bạn có chắc chắn muốn xóa không, xác nhận xóa?\')"><span class="glyphicon glyphicon-trash"></span> Xóa</span></td>';
                    data += '</tr>';
                });
                data += '</tbody></table>';
            } else {
                data = 'Không có dữ liệu để hiển thị';
            }
            $('#list_test').html(data);
        },
        error: function () {}
    });
};
$(document).on('click', '#show_list_test', getTestList);
$(document).on('change', '#topic_id', getTestList);


//Delete test
$(document).on('click', '.delete_test', function() {
    console.log($(this).data('id'));
    $.ajax({
        type: 'post',
        url: 'test/delete',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).data('id'),
        },
        success: getTestList,
        error: function() {
            console.log('error');
            alert('Có lỗi, vui lòng thử lại sau');
        },
    });
});

//Enable / disable test 
$(document).on('click', '.disable_test', function() {
    console.log($(this).data('id'));
    $.ajax({
        type: 'post',
        url: 'test/enable',
        data: {
            '_token': $('input[name=_token]').val(),
            'id': $(this).data('id'),
            'status': $(this).data('status'),
        },
        success: getTestList,
        error: function() {
            console.log('error');
            alert('Có lỗi, vui lòng thử lại sau');
        },
    });
});


/*---------------------------------------------------*/

// Custom ionRangeSlider in create test exam
$(".range_min_max").ionRangeSlider({
    min: 0,
    max: 100,
    from: 50,
    to: 80,
    type: 'int',
    prefix: "%",
    grid: true,
    grid_num: 5
});

// // Upload images
// var options = {
//     filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
//     filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
//     filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
//     filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
// };
// Ckeditor add new question

// CKEDITOR.replace('problem_ckeditor', options);
// CKEDITOR.replace('answer1_ckeditor', options);
// CKEDITOR.replace('answer2_ckeditor', options);
// CKEDITOR.replace('answer3_ckeditor', options);
// CKEDITOR.replace('answer4_ckeditor', options);
// CKEDITOR.replace('explain_ckeditor', options);

CKEDITOR.replace('ckeditor', options);