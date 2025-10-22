<!DOCTYPE html>
<html lang>
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
    @include('admin.css')

    <style>
        body {
            background: #2d3035; /* same dark theme background */
            font-family: "Muli", sans-serif;
            color: #fff;
        }

        .form-container {
            max-width: 600px;
            margin: 50px auto;
            background: #3a3f44;
            border-radius: 10px;
            padding: 30px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.3);
        }

        h2 {
            text-align: center;
            color: #00b4d8;
            margin-bottom: 25px;
            font-weight: 700;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 5px;
            color: #e0e0e0;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            border: 1px solid #555;
            border-radius: 6px;
            margin-bottom: 15px;
            font-size: 15px;
            background: #222529;
            color: #fff;
        }

        input:focus,
        textarea:focus,
        select:focus {
            border-color: #00b4d8;
            box-shadow: 0 0 6px rgba(0,180,216,0.4);
            outline: none;
        }

        button {
            background: #00b4d8;
            color: #fff;
            border: none;
            padding: 10px 25px;
            border-radius: 6px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #0091b2;
        }
    </style>
</head>

<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <div class="page-header">
            <div class="container-fluid">
                <div class="form-container">
                    <h2>Add New Product</h2>
                    <form>

                        <div>  
                            <label>Product Title</label>
                            <input type="text" name="title" required>
                        </div>

                        <div>  
                            <label>Description</label>
                            <textarea name="description" required></textarea>
                        </div>

                        <div>  
                            <label>Price</label>
                            <input type="text" name="price">
                        </div>

                        <div>  
                            <label>Quantity</label>
                            <input type="number" name="qty">
                        </div>

                        <div>  
                            <label>Product Category</label>
                            <select>
                                <option value="">-- Select Category --</option>
                            </select>
                        </div>

                        <div>  
                            <label>Product Image</label>
                            <input type="file" name="image">
                        </div>

                     <div class="text-center">
                           <input type="submit" value="Add Product" class="btn btn-success">
                     </div>


                    </form>            
                </div>
            </div>
        </div>
    </div>

    <!-- JavaScript files-->
    <script src="{{asset('admincss/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/popper.js/umd/popper.min.js')}}"></script>
    <script src="{{asset('admincss/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
    <script src="{{asset('admincss/js/front.js')}}"></script>
</body>
</html>
