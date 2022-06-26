var homejs = function() {

    var csrf_token = {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}

    var _componentHome = function () {
        $('#form-information').hide()
    }

    var _componentSubmit = function () {
        $("#buttonGet").click(function () {
            $.ajax({
                headers: csrf_token,
                url : baseurl,
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': 'data',
                    '_data': 'student',
                    'student_nisn': $('#student_nisn').val(),
                },
                success : function (resp) {
                    if (resp.class === 'danger'){
                        new PNotify({
                            title: resp['title'],
                            text: resp['text'],
                            addclass: 'alert bg-'+resp['class']+' border-'+resp['class']+' alert-styled-left text-white'
                        });
                    }
                    else {
                        $('#form-submit').hide();
                        $('#student_fullname').html(resp.student_fullname)
                        $('#student_class').html(resp.student_class)
                        $('#student_noijazah').html(resp.student_noijazah)
                        $('#student_placebirth').html(resp.student_placebirth)
                        $('#student_datebirth').html(resp.student_datebirth)
                        $('#student_father').html(resp.student_father)
                        $('#student_nsm').html(resp.student_nsm)
                        $('#student_nisn').html(resp.student_nisn)
                        $('#student_nopes').html(resp.student_nopes)
                        $('#student_nik').html(resp.student_nik)
                        $('#student_desc').html(resp.student_desc)
                        $('#form-information').show()

                    }
                }
            })
        })

        $("#ButtonValidate").click(function () {
            var agreement;
            $('input:checkbox[name=student_agreement]').each(function()
            {
                if($(this).is(':checked'))
                    agreement = 1;
            });
            $.ajax({
                headers: csrf_token,
                url : baseurl,
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': 'validated',
                    '_data': 'student',
                    'student_nisn': $('#student_nisn').val(),
                    'student_agreement': agreement,
                },
                success : function (resp) {
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-'+resp['class']+' border-'+resp['class']+' alert-styled-left text-white'
                    });
                }
            })
        })

        $("#ButtonDesc").click(function () {
            $.ajax({
                headers: csrf_token,
                url : baseurl,
                type: 'post',
                dataType: 'json',
                data: {
                    '_type': 'update',
                    '_data': 'student',
                    'student_nisn': $('#student_nisn').val(),
                    'student_comment': $('#student_comment').val(),
                    'student_phone': $('#student_phone').val(),
                },
                success : function (resp) {
                    new PNotify({
                        title: resp['title'],
                        text: resp['text'],
                        addclass: 'alert bg-'+resp['class']+' border-'+resp['class']+' alert-styled-left text-white'
                    });
                    $('#modal_confirm').modal('hide')
                }
            })
        })
    }

    return {
        init: function() {
           _componentHome()
           _componentSubmit()
        }
    }

}();

document.addEventListener('DOMContentLoaded', function() {
    homejs.init();
});
