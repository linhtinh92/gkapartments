<title>{{isset($meta_title) ? $meta_title : ($frontEndConfig['site_title'])}} | {{$frontEndConfig['tag_line'] or ""}}</title>
<meta name="description" content="{{isset($meta_description) ? $meta_description : ($frontEndConfig['site_description'])}}"/>
<meta name="keywords" content="{{isset($meta_keyword) ? $meta_keyword : ($frontEndConfig['site_keyword'])}}"/>