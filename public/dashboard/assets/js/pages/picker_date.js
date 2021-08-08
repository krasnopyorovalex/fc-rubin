/* ------------------------------------------------------------------------------
*
*  # Date and time pickers
*
*  Specific JS code additions for picker_date.html page
*
*  Version: 1.0
*  Latest update: Aug 1, 2015
*
* ---------------------------------------------------------------------------- */

$(function() {

    // Time
    $("#started_time_at").AnyTime_picker({
        format: "%H:%i:00",
        placement: 'popup',
        monthAbbreviations: [
            'Янв','Фев','Мар','Апр','Май','Июнь','Июль','Авг','Сент', 'Окт','Ноя','Дек'
        ],
        dayAbbreviations: [
            'Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт','Сб'
        ],
        labelYear: 'Год',
        labelDayOfMonth: 'День недели',
        labelMonth: 'Месяц',
        labelTitle: 'Время начала события',
        labelHour: 'Часы',
        labelMinute: 'Минуты'
    });

    // Date
    $("#started_at").AnyTime_picker({
        format: "%Y-%m-%d",
        placement: 'popup',
        monthAbbreviations: [
            'Янв','Фев','Мар','Апр','Май','Июнь','Июль','Авг','Сент', 'Окт','Ноя','Дек'
        ],
        dayAbbreviations: [
            'Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт','Сб'
        ],
        labelYear: 'Год',
        labelDayOfMonth: 'День недели',
        labelMonth: 'Месяц',
        labelTitle: 'Дата проведения события',
    });

    // Date
    // $("#finished_sale_at").AnyTime_picker({
    //     format: "%Y-%m-%d",
    //     placement: 'popup',
    //     monthAbbreviations: [
    //         'Янв','Фев','Мар','Апр','Май','Июнь','Июль','Авг','Сент', 'Окт','Ноя','Дек'
    //     ],
    //     dayAbbreviations: [
    //         'Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт','Сб'
    //     ],
    //     labelYear: 'Год',
    //     labelDayOfMonth: 'День недели',
    //     labelMonth: 'Месяц',
    //     labelTitle: 'Дата и время окончания продаж',
    //     labelHour: 'Часы',
    //     labelMinute: 'Минуты'
    // });


    // Localization
    $('.daterange-single').daterangepicker({
        applyClass: 'bg-slate-600',
        cancelClass: 'btn-default',
        singleDatePicker: true,
        opens: "left",
        locale: {
            format: 'YYYY-MM-DD',
            applyLabel: 'Вперед',
            cancelLabel: 'Отмена',
            startLabel: 'Начальная дата',
            endLabel: 'Конечная дата',
            customRangeLabel: 'Выбрать дату',
            daysOfWeek: ['Вс', 'Пн', 'Вт', 'Ср', 'Чт', 'Пт','Сб'],
            monthNames: ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь'],
            firstDay: 1
        }
    });
});
