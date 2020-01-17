{{ header }}{{ column_left }}
<div id="content">
    <div class="page-header">
        <div class="container-fluid">
            <div class="pull-right">
                <a href="{{ cancel }}" data-toggle="tooltip" title="{{button_cancel }}" class="btn btn-default"><i class="fa fa-reply"></i></a>
            </div>
            <h1>{{ heading_title }}</h1>
            <ul class="breadcrumb">
            {% for breadcrumb in breadcrumbs %}
                <li><a href="{{ breadcrumb.href }}">{{ breadcrumb.text}}</a></li>
            {% endfor %}
            </ul>
        </div>
    </div>

    <div class="container-fluid">
        {% if error_warning %}
        <div class="alert alert-danger alert-dismissible">
            <i class="fa fa-exclamation-circle"></i> {{ error_warning }}
            <button type="button" class="close" datadismiss="alert">&times;</button>
        </div>
        {% endif %}
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"> {{ text_instructions }}</h3>
            </div>
            <div class="panel-body">
                <div class="col-sm-10">
                {{ text_about }}
                </div>
            </div>
        </div>
    </div>
</div>
{{ footer }}
