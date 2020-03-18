<!DOCTYPE html>
<html>
<head>
<style>
#customers {
  font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  background-color: #4CAF50;
  color: white;
}
</style>
</head>
<body>

<table id="customers">
  <tr>
    <th>Title</th>
    <th>Download Url</th>
    <th>File Size</th>
    <th>Mime Type</th>
  </tr>
@foreach($files as $file):
  <tr>
    <td>{{$file->name}}</td>
    <td>{{$file->webViewLink}}</td>
    <td>{{($file->size/1024)}}</td>
    <td>{{$file->mimeType}}</td>
  </tr>
@endforeach;  
</table>

</body>
</html>
