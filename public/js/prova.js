$(document).ready(function(){
                    
    $('#aluno_lista').DataTable({
        language: 
            {
                url: '../datatables_languagem/pt-br.json'   
            },             
            processing: true,           
            responsive: true,
            ajax: 
            {
                url: $('#url').val(),                
            },
            columns: [
                {
                    data: 'id',
                    name: 'id' 
                },
                {
                    data: 'nome',
                    name: 'nome' 
                },
                { 
                    data: 'email',
                    name: 'email' 
                },                   
                { 
                    data: 'acoes',
                    name: 'acoes',
                    orderable: false
                }
            ]                 
    });
     
    $('#curso_lista').DataTable({
            language: 
                {
                    url: '../datatables_languagem/pt-br2.json'  
                },               
                serverSide: true,
                responsive: true,
                ajax: 
                {
                    url: $('#url').val() 
                },
                columns: [                    
                    {
                        data: 'id',
                        name: 'id' 
                    },
                    {
                        data: 'titulo',
                        name: 'titulo' 
                    },
                    {
                        data: 'descricao',
                        name: 'descricao' 
                    },
                    { 
                        data: 'acoes',
                        name: 'acoes',
                        orderable: false
                    }
                ]
     });
     
    $('#matricula_lista').DataTable({
        language: 
            {
                url: '../datatables_languagem/pt-br3.json'   
            },     
            processing: true,
            responsive: true,
            ajax: 
            {
                url: $('#url').val(),                
            },
            columns: [              
                {
                    data: 'nome',
                    name: 'nome' 
                },
                { 
                    data: 'curso',
                    name: 'curso' 
                },                   
                { 
                    data: 'acoes',
                    name: 'acoes',
                    orderable: false
                }
            ]                 
    });
 });