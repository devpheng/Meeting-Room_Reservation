
const { forEach, kebabCase } = require('lodash');

require('./bootstrap');

jQuery(document).ready(function($) {
    $('.table').on('mouseover', 'th', function() {
        $(this).find('i').css('visibility', 'visible');
    });

    $('.table').on('mouseout', 'th', function() {
        $(this).find('i').css('visibility', 'hidden');
    });

    // Ajax add tag
    $('#action-tag').on('click', function() {
        let name = $('#name').val();
        if(name == '') {
            $('#require').removeClass('d-none'); 
            return;
        } else {
            $('#require').addClass('d-none'); 
        }
        let id = $('#id').val();
        let method = "";
        let url = "";
        if(id=='') {
            method = "POST";
            url = routes.department.store;
        } else {
            method = "PATCH";
            url = routes.department.update;

            var value = url.substring(url.lastIndexOf('/') + 1);
            url = url.replace(value, id);
        }

        $.ajax({
            method: method,
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            },
            data: { 
                name: name,
                id: id
            }
        })
        .fail(function (jqXHR, textStatus) {
            console.log(textStatus + " " +jqXHR.responseJSON.message);
        }).success(function(data) {
            if(data.message) {
                $('#modal .modal-body p').text(data.message);
                $('#modal').modal('show');
                return;
            }
            let $id = $('#id').val();
            if($id == '') {
                $department = `<tr data-id="${data.department.id}">
                        <td class="serial text-success"><i class="fa-solid fa-circle-check"></i></td>
                        <td class="align-middle"><span class="tag-name">${data.department.name}</span></td>
                        <td>
                            <div class="action-box">
                                <button type="button" class="btn btn-outline-primary btn-sm edit"><i class="fa-solid fa-file-pen"></i>&nbsp; Edit</button>
                            </div>
                        </td>
                    </tr>`;
                $('.table tbody').prepend($department);
            } else {
                let $department = $(`.table tr[data-id=${$id}]`);
                $department.find('.tag-name').text(data.department.name);
                $('#action-tag').text('Add Department');
            }
            $('#name').val('');
            $('#id').val('');
        });
    });


    $('.table').on('click', '.edit', function() {
        let $tag = $(this).parents('tr');
        $('#id').val($tag.attr('data-id'));
        $('#name').val($tag.find('.tag-name').text());
        $('#action-tag').text('Save');
    });

    $('.table').on('click', '.delete', function() {
        $('#delete-modal').modal('show');
        let id = $(this).attr('data-id');
        $('#delete-modal').find('.btn-ok').attr('data-id', id);
    });

    $('#delete-modal').on('click', '.btn-secondary', function(e) {
        $('#delete-modal').modal('hide');
    });

    $('#delete-modal').on('click', '.btn-ok', function(e) {
        let url = routes.department.update;
        url = url.replace(url.substring(url.lastIndexOf('/') + 1), $(this).attr('data-id'));
        $.ajax({
            method: "DELETE",
            url: url,
            headers: {
                'X-CSRF-TOKEN': $('input[name="_token"]').val()
            }
        })
        .fail(function (jqXHR, textStatus) {
            console.log(textStatus + " " +jqXHR.responseJSON.message);
        }).success(function(data) {
            let $id = data.id;
            let $department = $(`.table tr[data-id=${$id}]`);
            $department.remove();
            $('#delete-modal').modal('hide');
        });
    });

    $('.table tr thdemo').on('click', function(e) {
        let tags = tableToArray('.table');
        let index = $(this).parent().find('th').index(this);
        let sort = $(this).attr('data-sort');

        tags.sort(function(a, b) {
            if (a[index] === b[index]) {
               return 0;
            } else {
                if(sort == 'asc') {
                    return (a[index].localeCompare(b[index]) == true) ? -1 : 1;
                } else {
                    return (a[index].localeCompare(b[index]) == false) ? -1 : 1;
                }
               
            }
        });
        
        $('.table tr th i').removeClass('visible');
        $(this).siblings().find('i').removeClass('fa-caret-up');
        $(this).siblings().find('i').addClass('fa-caret-down');
        $(this).siblings().attr('data-sort', 'asc');
        $(this).find('i').addClass('visible');
        $(this).find('i').toggleClass('fa-caret-up fa-caret-down');
        if (sort == 'asc') {
            $(this).attr('data-sort', 'desc');
        } else {
            $(this).attr('data-sort', 'asc');
        }
        $('.table tbody').html("");
        tags.forEach(function(tag) {
            var i =1;
            $row = `<tr data-id="${tag[3]}">
                        <td class="serial text-success">${i}</td>
                        <td class="align-middle"><span class="tag-name">>${tag[0]}</span></td>
                        <td>
                            <div class="action-box">
                                <button type="button" class="btn btn-outline-primary btn-sm edit"><i class="fa-solid fa-file-pen"></i>&nbsp; Edit</button>
                            </div>
                        </td>
                    </tr>`;
            i++;
            $('.table tbody').prepend($row);
        });
    });


    function tableToArray(table) {
        var data = Array();
        $(table + " tbody tr").each(function(i, v){
            data[i] = Array();
            data[i][3] = $(this).attr("data-id");
            $(this).children('td').each(function(ii, vv){
                if(ii == 0) {
                    data[i][ii] = $(this).find("span").text();
                } else {
                    data[i][ii] = $(this).text();
                }
                
            });
        });
        return data;
    }
});