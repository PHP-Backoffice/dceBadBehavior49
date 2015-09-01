/**
 * dceBadBehavior JS
 *
 * @version    $Rev$
 * @author     Ortwin Pinke
 * @copyright  PHP-Backoffice <www.php-backoffice.de>
 * 
 * $Id$
 */
/*!
 * minified version of dceBadBehavior JS
 * @author     Ortwin Pinke
 * @copyright  PHP-Backoffice <www.php-backoffice.de>
 * $Id$
 */

function showProInfo() {
    $("body").trigger("click");
    $("#bb_info").plainModal('open', {
        offset: {
            left: 200,
            top: 100
        }
    });
};

$(document).ready(function () {

    // Ignore console on platforms where it is not available
    if (typeof (window.console) == "undefined") {
        console = {};
        console.log = console.warn = console.error = function (a) {
        };
    }

    var table = $("#badbehavior_data").DataTable({
        language: {
            url: Con.cfg['urlBackend'] + 'plugins/dceBadBehavior/scripts/i18n/German.json'
        },
        processing: true,
        serverSide: true,
        deferRender: true,
        select: {
            style: 'single',
            blurable: true
        },
        dom: 'lBfrtip',
        buttons: [
            {
                extend: 'selectedSingle',
                text: function(dt,button,config) {
                    return dt.i18n('buttons.show', 'Show');
                },
                name: 'show',
                action: function (e, dt, type, indexes) {
                    console.log(dt.rows({selected: true}).data().toArray());
                    $.ajax({
                        type: 'POST',
                        url: 'main.php?frame=4&area=dceBadBehavior&ajax_action=get_log_entry',
                        data: {bbid: dt.rows({selected: true}).data()[0][0]},
                        beforeSend: function (xhr, obj) {
                            $("#bb_entry_id").html(dt.rows({selected: true}).data()[0][0]);
                            $("#bb_entry").plainModal('open', {
                                offset: {
                                    left: 200,
                                    top: 80
                                },
                                close: function (e) {
                                    $("#bb_entry_data").html('<img id="bb_entry_loader_img" src="images/ajax-loader_16x16.gif" alt="loading..." />');
                                }
                            });
                        },
                        success: function (msg) {
                            var msgDat = $.parseJSON(msg);
                            console.log(msgDat);
                            var msgOut = "date: " + msgDat.date + "<br/>";
                            msgOut += "ip: " + msgDat.ip + "<br/>";
                            msgOut += "agent: " + msgDat.user_agent + "<br/>";
                            msgOut += "key: " + msgDat.key + "<br/>";
                            msgOut += "headers: " + msgDat.http_headers + "<br/>";
                            msgOut += "<b>Request</b><br/>";
                            msgOut += "uri: " + msgDat.request_uri + "<br/>";
                            msgOut += "method: " + msgDat.request_method + "<br/>";
                            msgOut += "entity: " + msgDat.request_entity + "<br/>";
                            $("#bb_entry_data").html(msgOut);
                        }
                    });
                }
            },
            {
                extend: 'collection',
                text: function(dt,button,config) {
                    return dt.i18n('buttons.delete', 'Delete');
                },
                buttons: [
                    {
                        extend: 'selectedSingle',
                        text: 'Entry',
                        action: function (e) {
                            showProInfo();
                        }
                    },
                    {
                        text: 'empty DB',
                        action: function (e) {
                            showProInfo();
                        }
                    }
                ]
            },
            {
                extend: 'collection',
                text: function(dt,button,config) {
                    return dt.i18n('buttons.export', 'Export');
                },
                buttons: [
                    {
                        extend: 'copy',
                        text: 'Copy to Clipboard',
                        action: function (e) {
                            showProInfo();
                        }
                    },
                    {
                        extend: 'csv',
                        text: 'CSV File',
                        action: function (e) {
                            showProInfo();
                        }
                        /*
                         title: 'badbehavior',
                         fieldSeparator: ';',
                         fieldBoundary: '"',
                         exportOptions: {
                         modifier: {
                         search: 'none'
                         }
                         }*/
                    },
                    {
                        extend: 'excel',
                        text: 'XLS File',
                        action: function (e) {
                            showProInfo();
                        }
                    }
                ]
            }
        ],
        ajax: "main.php?frame=4&area=dceBadBehavior&ajax_action=get_log_data"
    });

    $("#badbehavior_data").on('select.dt', function (e, dt, type, indexes) {

    });

    $("#bb_options").on('click', function (e) {
        showProInfo();
    })

    $("#bb_options input").on('click', function (e) {
        showProInfo();
    })

    $("#but_info_img").on('click', function (e) {
        $("#bb_help").plainModal('open', {
            offset: {
                left: 150,
                top: 80
            }
        });
    });
}
);