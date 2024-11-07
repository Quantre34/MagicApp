@extends('panel.app')

@section('style')

<!------ Include the above in your HEAD tag ---------->
<style type="text/css">
body {
    background: #fff!important;
}
.tree, .tree ul {
    margin:0;
    list-style:none
}
.tree ul {
    margin-left:1em;
    position:relative
}
.tree ul ul {
    margin-left:.5em
}
.tree ul:before {
    content:"";
    display:block;
    width:0;
    position:absolute;
    top:0;
    bottom:0;
    left:0;
    border-left:1px solid
}
.tree li {
    margin:0;
    padding:0 1em;
    line-height:2em;
    color:#369;
    font-weight:700;
    position:relative
}
.tree ul li:before {
    content:"";
    display:block;
    width:10px;
    height:0;
    border-top:1px solid;
    margin-top:-1px;
    position:absolute;
    top:1em;
    left:0
}
.tree ul li:last-child:before {
    background:#fff;
    height:auto;
    top:1em;
    bottom:0
}
.indicator {
    margin-right:5px;
}
.tree li a {
    text-decoration: none;
    color:#369;
}
.tree li button, .tree li button:active, .tree li button:focus {
    text-decoration: none;
    color:#369;
    border:none;
    background:transparent;
    margin:0px 0px 0px 0px;
    padding:0px 0px 0px 0px;
    outline: 0;
} 
.branch {
    cursor: pointer;
}
</style>
@endsection
@section('content')
  <main>
<div class="container" style="margin-top:30px; color:var(--primary)">
    <div class="row">

        <div class="col-md-8">
            <p class="well" style="height:135px;"><strong>Process</strong></p>
            <ul id="tree2">
                <li><a href="#">Me</a>

                    <ul>
                        <li><p onclick="ClickParent(this)" style="color:red;">SubManagers</p>
                            <ul>
                            @foreach($SubManagers as $Manager)
                                <li>{{$Manager['FirstName']}} {{$Manager['LastName']}}
                                    <ul>
                                        <li><p onclick="ClickParent(this)" style="color:red;">SubManagers</p>
                                            <ul>
                                            @foreach($Manager['SubManagers'] as $Manager1)
                                                <li>{{$Manager1['FirstName']}} {{$Manager1['LastName']}}</li>
                                                <li><p onclick="ClickParent(this)" style="color:red;">Agencies</p>
                                                    <ul>
                                                    @foreach($Manager1['Agencies'] as $Agency)
                                                             <li>{{$Agency['Title']}}
                                                                    <ul>
                                                                        <li><p onclick="ClickParent(this)" style="color:red;">Agents</p>
                                                                            <ul>
                                                                            @foreach($Agency['Users'] ?? [] as $User)
                                                                                <li>{{$User['FirstName']}} {{$User['LastName']}}
                                                                                    <ul>
                                                                                        @foreach($User['Appointments'] as $Appointment)
                                                                                            <li><a href="/panel/Appointments/{{$Appointment['uid']}}">{{$Appointment['uid']}}</a></li>
                                                                                        @endforeach
                                                                                    </ul>
                                                                                </li>
                                                                            @endforeach
                                                                            </ul>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                    @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                            </ul>
                                        </li>
                                        <li><p onclick="ClickParent(this)" style="color:red;">Agencies</p>
                                            @foreach($Manager['Agencies'] as $Agency)
                                                <ul>
                                                    <li>{{$Agency['Title']}}
                                                        <ul>
                                                            <li><p onclick="ClickParent(this)" style="color:red;">Agents</p>
                                                                <ul>
                                                                @foreach($Agency['Users'] ?? [] as $User)
                                                                    <li>{{$User['FirstName']}} {{$User['LastName']}}
                                                                        <ul>
                                                                            @foreach($User['Appointments'] as $Appointment)
                                                                                <li><a href="/panel/Appointments/{{$Appointment['uid']}}">{{$Appointment['uid']}}</a></li>
                                                                            @endforeach
                                                                        </ul>
                                                                    </li>
                                                                @endforeach
                                                                </ul>
                                                            </li>
                                                        </ul>
                                                    </li>
                                                </ul>
                                            @endforeach
                                        </li>
                                    </ul>
                                </li>
                            @endforeach
                            </ul>
                        </li>
                        <li><p onclick="ClickParent(this)" style="color:red;">Agencies</p>
                            <ul>
                            @foreach($Agencies as $Agency)
                                <li>{{$Agency['Title']}}
                                    <ul>
                                        <li><p onclick="ClickParent(this)" style="color:red;">Agents</p>
                                            <ul>
                                            @foreach($Agency['Users'] ?? [] as $User)
                                                <li>{{$User['FirstName']}} {{$User['LastName']}}
                                                    <ul>
                                                        @foreach($User['Appointments'] as $Appointment)
                                                            <li><a href="/panel/Appointments/{{$Appointment['uid']}}">{{$Appointment['uid']}}</li></a>
                                                        @endforeach
                                                    </ul>
                                                </li>
                                            @endforeach
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            @endforeach
                            </ul>
                        </li>                        
                    </ul>
                </li>
            </ul>
        </div>

    </div>
</div>
  </main>

@endsection
@section('script')
<script type="text/javascript">
  $.fn.extend({
    treed: function (o) {
      
      var openedClass = 'glyphicon-minus-sign';
      var closedClass = 'glyphicon-plus-sign';
      
      if (typeof o != 'undefined'){
        if (typeof o.openedClass != 'undefined'){
        openedClass = o.openedClass;
        }
        if (typeof o.closedClass != 'undefined'){
        closedClass = o.closedClass;
        }
      };
      
        //initialize each of the top levels
        var tree = $(this);
        tree.addClass("tree");
        tree.find('li').has("ul").each(function () {
            var branch = $(this); //li with children ul
            branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
            branch.addClass('branch');
            branch.on('click', function (e) {
                if (this == e.target) {
                    var icon = $(this).children('i:first');
                    icon.toggleClass(openedClass + " " + closedClass);
                    $(this).children().children().toggle();
                    //
                }
            });
            branch.children().children().toggle();
        });
        //fire event from the dynamically added icon
      tree.find('.branch .indicator').each(function(){
        $(this).on('click', function () {
            $(this).closest('li').click();
        });
      });
        //fire event to open branch if the li contains an anchor instead of text
        tree.find('.branch>a').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
        //fire event to open branch if the li contains a button instead of text
        tree.find('.branch>button').each(function () {
            $(this).on('click', function (e) {
                $(this).closest('li').click();
                e.preventDefault();
            });
        });
    }
});

//Initialization of treeviews


$('#tree2').treed({openedClass:'glyphicon-folder-open', closedClass:'glyphicon-folder-close'});

$(document).ready(function(){
    $('.branch').trigger('click');
});
function ClickParent(e){
    $(e).parent().trigger('click');
}
</script>

@endsection