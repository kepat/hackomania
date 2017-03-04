// Notification icon based on the given type
var notification_icon = {
    "": "",
    "info": "pe-7s-info",
    "success": "pe-7s-check",
    "warning": "pe-7s-bell",
    "danger": "pe-7s-light"
};

// Notification instance
notification = {
    showNotification: function (message, type, from, align) {
        $.notify({
            icon: notification_icon[type],
            message: message
        }, {
            type: type,
            timer: 4000,
            placement: {
                from: from,
                align: align
            }
        });
    }
};

// Add the prefix value to any variable
function addPrefix(data, prefix) {
    var result;

    // Check the data type
    if (typeof data === 'string') {
        // It's a string
        result = prefix + data;
    } else {
        // It's an array
        result = data.map(function (el) {
            return prefix + el;
        })
    }

    return result;
}

// Display the local date and time, parameter is always considered with a UTC timezone
function displayLocalTimezone(date) {
    var result = '';

    // Prepare the date and convert it to utc
    date = new Date(date);
    date = createDateAsUTC(date);

    // Prepare the date format
    result += date.getFullYear();
    result += '-' + pad((date.getMonth() + 1), 0, 2);
    result += '-' + pad((date.getDate()), 0, 2);
    result += ' ' + pad((date.getHours()), 0, 2);
    result += ':' + pad((date.getMinutes()), 0, 2);
    result += ':' + pad((date.getSeconds()), 0, 2);

    return result;
}

// Set the date timezone as utc with the literal values
function createDateAsUTC(date) {
    return new Date(Date.UTC(date.getFullYear(), date.getMonth(), date.getDate(), date.getHours(), date.getMinutes(), date.getSeconds()));
}

// Add padding to the string
function pad(value, pad, length, location) {
    // Convert the data to string
    var result = String(value);

    // Append the padding needed
    while (result.length < length) {
        // Check where to add the pad
        if (location == 'right') {
            result = result + pad;
        } else {
            result = pad + result;
        }
    }

    return result;
}

// Convert the app status to string
function appStatusToString(status)
{
    var result = status;

    if (status == 0) {
        result = 'Inactive';
    } else if (status == 1) {
        result = 'Active';
    }

    return result;
}