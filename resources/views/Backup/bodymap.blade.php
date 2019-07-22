@extends('layouts.auth')

<script type = "text/javascript">
         
    function ShowDoctors(name) {
        document.myform.q.value = name
    }

    function SearchDoctors(name) {
        document.myform.q.value = name
        document.myform.submit();
    }
    
</script>

@section('content')
<div class="container">
<body>

        <form action="doctorSearch" name = "myform" method="POST" role="search">
            {{ csrf_field() }}
            <div class="input-group">
                <input type="text" class="form-control" name="q"
                    placeholder="Search doctors by speciality"> <span class="input-group-btn">
                    
                </span>
            </div>
        </form>

      <div class="row">
      
         <div class="col-md-9 text-center">
         <!-- Create  Mappings -->

         <h2>Where's the problem? <span class="badge badge-secondary"></span></h2>

         <img src = "body.jpg" alt = "HTML Map" border = "0" usemap = "#tutorials"/>
         
         <map name = "tutorials">
            <area shape="poly" 
               coords = "425,76,438,69,442,63,446,57,442,51,442,39,436,29,425,24,412,32,409,42,409,50,405,55,408,63,412,70,416,73,420,75"
               href = "#" alt = "ENT" title="Ear Nose Throat"
               target = "_self" 
               onMouseOver = "ShowDoctors('ENT')" 
               onMouseOut = "ShowDoctors('')"
               onclick = "SearchDoctors('ENT')" />
            
            <area shape="poly" 
               coords = "413,71,412,77,409,84,412,90,419,94,425,96,433,96,438,92,441,86,440,82,437,77,437,73,429,75,426,74,421,77,417,73,426,79"
               href = "#" alt = "Perl Tutorial"
               target = "_self" 
               onMouseOver = "ShowDoctors('Neck')"
               onMouseOut = "ShowDoctors('')" />
            
            <area shape="poly" 
               coords = "392,201,392,187,392,178,390,168,388,155,386,144,386,133,386,123,388,119,396,115,404,112,410,111,426,111,433,111,442,111,452,112,464,116,470,119,469,126,468,137,466,145,464,151,460,161,458,169,457,178,457,187,458,194,460,200,457,203,452,194,449,188,445,184,440,183,435,181,429,182,420,182,414,183,413,189,409,192,406,197,404,200,401,204,397,207,394,207"
               href = "#" alt = "Perl Tutorial" title="Heart"
               target = "_self" 
               onMouseOver = "ShowDoctors('Cardiologist')"
               onMouseOut = "ShowDoctors('')"
               onclick = "SearchDoctors('Cardiologist')" />
            <area shape="poly" 
               coords = "394,210,424,212,457,212,464,238,429,245,389,242,385,241"
               href = "#" alt = "Perl Tutorial" title="Kidney, Urine"
               target = "_self" 
               onMouseOver = "ShowDoctors('Urologist')" 
               onMouseOut = "ShowDoctors('')"
               onclick = "SearchDoctors('Urologist')" />
            <area shape="poly" 
               coords = "385,246,382,264,380,285,380,298,380,313,381,329,377,341,377,359,381,379,384,389,384,403,381,416,376,437,370,445,377,450,389,452,394,449,398,440,400,422,396,403,396,400,398,385,398,373,404,363,405,338,404,327,404,314,412,291,413,280,418,265,420,253,422,248,426,248,430,255,431,272,435,289,438,296,440,305,442,321,445,329,446,344,446,356,449,369,453,392,452,405,453,422,453,440,457,452,470,452,481,449,472,420,466,392,468,375,473,363,474,345,471,333,470,327,469,316,472,302,472,288,472,273,470,256,465,250,466,243,382,243,385,241,460,248,458,252,453,252"
               href = "https://www.google.com" alt = "Perl Tutorial" title=""
               target = "_self" 
               onMouseOver = "ShowDoctors('Leg')" 
               onMouseOut = "ShowDoctors('')"/>
            <area shape="poly" 
               coords = "384,137,374,148,369,159,362,172,355,185,342,199,330,208,327,224,325,237,320,250,310,257,309,242,316,221,319,208,327,193,333,177,343,161,349,151,358,133,362,125,365,117,373,107,378,103
               ,465,126,474,144,477,154,487,170,501,189,518,205,523,222,526,241,532,248,539,256,542,243,538,224,531,208,523,190,513,168,506,156,491,130,481,114,474,104,470,99,463,97"
               href = "https://www.google.com" alt = "Perl Tutorial" title=""
               target = "_self" 
               onMouseOver = "ShowDoctors('Hand')" 
               onMouseOut = "ShowDoctors('')"/>
            <area shape="poly" 
               coords = "426,170,420,177,410,191,404,204,408,210,427,209,434,211,440,209,449,207,453,204,448,196,444,188,435,179,431,173"
               href = "https://www.google.com" alt = "Perl Tutorial" title="Gastrologist"
               target = "_self" 
               onMouseOver = "ShowDoctors('Gastrologist')" 
               onMouseOut = "ShowDoctors('')"/>
         </map>

      </div>

      <div class="col-md-3 text-center">
         <h2>What's the problem? <span class="badge badge-secondary"></span></h2>
         <div class="list-group">
            <a href="#" class="list-group-item list-group-item-action"
               onMouseOver = "ShowDoctors('ENT')"
               onMouseOut = "ShowDoctors('')"
               onclick = "SearchDoctors('ENT')">
               Do you have Cough, Fever or Cold?
            </a>
            <a href="#" class="list-group-item list-group-item-action"
               onMouseOver = "ShowDoctors('ENT')"
               onMouseOut = "ShowDoctors('')"
               onclick = "SearchDoctors('ENT')">
               Have problem in ear?
            </a>
            <a href="#" class="list-group-item list-group-item-action"
               onMouseOver = "ShowDoctors('Urologist')"
               onMouseOut = "ShowDoctors('')"
               onclick = "SearchDoctors('Urologist')">
               Have problem of urine?
            </a>

            <a href="#" class="list-group-item list-group-item-action"
               onMouseOver = "ShowDoctors('Cardiologist')"
               onMouseOut = "ShowDoctors('')"
               onclick = "SearchDoctors('Cardiologist')">
               Have chest pain or discomfort?
            </a>
         </div>
      </div>

   </div>
   </body>
</div>
@endsection