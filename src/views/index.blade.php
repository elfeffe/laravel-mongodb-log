<html>
<head>
    <title>
        Mongodb Log Manager
    </title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link type="text/css" rel="stylesheet" href="amirhb/css/jsgrid/jsgrid.min.css" />
    <link type="text/css" rel="stylesheet" href="amirhb/css/jsgrid/jsgrid-theme.min.css" />

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="amirhb/js/jsgrid/jsgrid.min.js"></script>

    <script>
        $(function() {

            $("#jsGrid").jsGrid({
                width: "100%",
                height: "auto",

                filtering: true,
                sorting: true,
                paging: true,
                autoload: true,

                controller: {
                    loadData: function(filter) {
                        var d = $.Deferred();

                        $.ajax({
                            url: "{{ route('filter-logs') }}",
                            dataType: "json",
                            data: filter
                        }).done(function(response) {
                            d.resolve(response);
                        });

                        return d.promise();
                    }
                },

                fields: [
                    { name: "env", type: "text" },
                    { name: "message", type: "text" },
                    { name: "level", type: "text" },
                    { name: "context", type: "text" },
                    { name: "extra", type: "text" },
                    { name: "date", type: "text" },
                    { name: "timezone", type: "text" },

                ],
            });});
    </script>

</head>

<body>

<div id="jsGrid"></div>

</body>

</html>