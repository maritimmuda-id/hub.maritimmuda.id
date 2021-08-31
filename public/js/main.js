$(document).ready(function () {
    window._token = $('meta[name="csrf-token"]').attr("content");

    $.ajaxSetup({
        headers: {"X-CSRF-TOKEN": window._token},
    });

    // Start DataTable
    window.adjustDataTable = function () {
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    };

    window.dataTableDeleteButton = function (route) {
        return {
            text: trans.dt.deleteButton,
            url: route,
            className: "btn-danger",
            action: function (e, dt, node, config) {
                let ids = $.map(
                    dt.rows({ selected: true }).nodes(),
                    function (entry) {
                        return $(entry).data("entry-id");
                    }
                );

                if (ids.length === 0) {
                    Swal.fire({
                        title: window.trans.dt.zeroSelected,
                        icon: "warning",
                    });
                    return;
                }

                if (confirm(window.trans.areYouSure)) {
                    $.ajax({
                        headers: { "x-csrf-token": _token },
                        method: "POST",
                        url: config.url,
                        data: { ids: ids, _method: "DELETE" },
                    }).done(function () {
                        location.reload();
                    });
                }
            },
        };
    };

    $.extend(true, $.fn.dataTable.Buttons.defaults.dom.button, {
        className: "btn",
    });

    $.extend(true, $.fn.dataTable.defaults, {
        columnDefs: [
            {
                orderable: false,
                className: "select-checkbox",
                targets: 0,
            },
            {
                orderable: false,
                searchable: false,
                targets: -1,
            },
        ],
        select: {
            style: "multi+shift",
            selector: "td:first-child",
        },
        order: [],
        scrollX: true,
        pageLength: 10,
        dom: 'lBfrtip<"actions">',
        buttons: [
            {
                extend: "selectAll",
                className: "btn-primary",
                text: window.trans.dt.selectAllButton,
                exportOptions: {
                    columns: ":visible",
                },
                action: function (e, dt) {
                    e.preventDefault();
                    dt.rows().deselect();
                    dt.rows({ search: "applied" }).select();
                },
            },
            {
                extend: "selectNone",
                className: "btn-primary",
                text: window.trans.dt.selectNoneButton,
                exportOptions: { columns: ":visible" },
            },
            {
                extend: "copy",
                className: "btn-default",
                text: window.trans.dt.copyButton,
                exportOptions: { columns: ":visible" },
            },
            {
                extend: "csv",
                className: "btn-default",
                text: window.trans.dt.csvButton,
                exportOptions: { columns: ":visible" },
            },
            {
                extend: "excel",
                className: "btn-default",
                text: window.trans.dt.excelButton,
                exportOptions: { columns: ":visible" },
            },
            {
                extend: "pdf",
                className: "btn-default",
                text: window.trans.dt.pdfButton,
                exportOptions: { columns: ":visible" },
            },
            {
                extend: "print",
                className: "btn-default",
                text: window.trans.dt.printButton,
                exportOptions: { columns: ":visible" },
            },
            {
                extend: "colvis",
                className: "btn-default",
                text: window.trans.dt.colvisButton,
                exportOptions: { columns: ":visible" },
            },
        ],
    });

    $.fn.dataTable.ext.classes.sPageButton = "";
    // End DataTable

    moment.updateLocale("en", {
        week: { dow: 1 }, // Monday is the first day of the week
    });

    $(".date").datetimepicker({
        format: "YYYY-MM-DD",
        locale: "en",
        icons: {
            up: "fas fa-chevron-up",
            down: "fas fa-chevron-down",
            previous: "fas fa-chevron-left",
            next: "fas fa-chevron-right",
        },
    });

    $(".datetime").datetimepicker({
        format: "YYYY-MM-DD HH:mm:ss",
        locale: "en",
        sideBySide: true,
        icons: {
            up: "fas fa-chevron-up",
            down: "fas fa-chevron-down",
            previous: "fas fa-chevron-left",
            next: "fas fa-chevron-right",
        },
    });

    $(".timepicker").datetimepicker({
        format: "HH:mm:ss",
        icons: {
            up: "fas fa-chevron-up",
            down: "fas fa-chevron-down",
            previous: "fas fa-chevron-left",
            next: "fas fa-chevron-right",
        },
    });

    $(".select-all").click(function () {
        let $select2 = $(this).parent().siblings(".select2");
        $select2.find("option").prop("selected", "selected");
        $select2.trigger("change");
    });
    $(".deselect-all").click(function () {
        let $select2 = $(this).parent().siblings(".select2");
        $select2.find("option").prop("selected", "");
        $select2.trigger("change");
    });

    $(".select2").select2();

    $(".treeview").each(function () {
        let shouldExpand = false;
        $(this).find("li")
            .each(function () {
                if ($(this).hasClass("active")) {
                    shouldExpand = true;
                }
            });

        if (shouldExpand) {
            $(this).addClass("active");
        }
    });

    $('a[data-toggle="tab"]').on("shown.bs.tab click", function (e) {
        window.adjustDataTable();
    });

    $(".c-header-toggler.mfs-3.d-md-down-none").click(function (e) {
        $("#sidebar").toggleClass("c-sidebar-lg-show");

        setTimeout(function () {
            window.adjustDataTable();
        }, 400);
    });
});
