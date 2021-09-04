$(document).ready(function () {
    window._token = $('meta[name="csrf-token"]').attr("content");

    $.ajaxSetup({
        headers: {"X-CSRF-TOKEN": window._token},
    });

    window.lgThumb = function () {
        for (const el of document.getElementsByClassName("img-preview")) {
            window.lightGallery(el, {
                thumbnail: true,
                licenseKey: 'assad-asa-adaas-asas',
            });
        }
    };

    window.adjustDataTable = function () {
        $($.fn.dataTable.tables(true)).DataTable().columns.adjust();
    };

    $('a[data-toggle="tab"]').on("shown.bs.tab click", function (e) {
        window.adjustDataTable();
    });

    $(".c-header-toggler.mfs-3.d-md-down-none").click(function (e) {
        $("#sidebar").toggleClass("c-sidebar-lg-show");

        setTimeout(function () {
            window.adjustDataTable();
        }, 400);
    });

    moment.updateLocale("en", {
        week: { dow: 1 }, // Monday is the first day of the week
    });

    $(".month").datetimepicker({
        format: "YYYY-MM",
        locale: "en",
        icons: {
            up: "fas fa-chevron-up",
            down: "fas fa-chevron-down",
            previous: "fas fa-chevron-left",
            next: "fas fa-chevron-right",
        },
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
});
