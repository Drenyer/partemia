<!DOCTYPE html>
<html>

<head>
  <meta charset="UTF-8">
  
  <title>Aviso de Contacto</title>
  
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      background: #f5f5f5;
      font-family: Arial;
      padding: 20px;  
    }
    
    .container {
      max-width: 600px;
        
    }

    .card {
      background: #fff;
      padding: 20px;
      border-radius: 4px;
      box-shadow: 0 0 10px #ccc; 
    }

    .title {
      color: #343a40;
    }

    .form-control {
      border-radius: 4px;
      border-color: #ced4da; 
    }

    .btn {
      background: #007bff;
      border-color: #007bff;
      color: #fff;
    }
    
    .btn:hover {
      background: #0069d9; 
      border-color: #0062cc;
    }

  </style>
  
</head>

<body>

  <div class="container">

    <div class="card">
    
      <h3 class="title">Contactar al Cliente</h3>

      <form>
        <div class="mb-3">
          <label>DNI</label>
          <input type="text" class="form-control" name="Dni" placeholder="Ingrese DNI"> 
        </div>
        
        <button type="submit" class="btn btn-primary">Buscar</button>
      </form>

    </div>

  </div>

</body>

</html>