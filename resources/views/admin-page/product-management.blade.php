@extends('admin-page.template')

@section('cssImport')
     <!-- DataTables -->
     <link href="plugins/datatables/dataTables.bootstrap4.min.css" rel="stylesheet" type="text/css" />
     <link href="plugins/datatables/buttons.bootstrap4.min.css" rel="stylesheet" type="text/css" />
     <!-- Responsive datatable examples -->
     <link href="plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" /> 
@endsection

@section('content')
    
    <livewire:product-management >
    <script src="plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="plugins/datatables/dataTables.buttons.min.js"></script>
    <script src="plugins/datatables/buttons.bootstrap4.min.js"></script>
  
    <!-- Responsive examples -->
    <script src="plugins/datatables/dataTables.responsive.min.js"></script>
    <script src="plugins/datatables/responsive.bootstrap4.min.js"></script>
    <script src="helpers/jquery.datatable.init.js"></script>
@endsection