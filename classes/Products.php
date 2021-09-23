<?php
require_once 'MyPdo.php';

class Products  extends MyPdo
{
    //getAlldATA

    function getAll()
    {
        $products = [];
        $stmt = $this->connect();
        $query = "select * from products";
        $stmt= $stmt->prepare($query);
        $stmt->execute();

        while( $row = $stmt->fetch())
        {
            array_push($products , $row);
        }

        return  $products ;


    }
    //Show details

    function show($id)
    {
        $stmt = $this->connect();
        $query = "select * from products where id=:id";
        $stmt= $stmt->prepare($query);
        $stmt->execute([":id" => $id]);
        $result = $stmt->fetch();
        return $result;
    }
    //create 
    function create ($proname , $price , $prodesc , $img)
    {
        $query = "insert into products(proname , price , prodesc , img) values (?,?,?,?)";
        $result =  $this->connect();  
        $result =  $result->prepare($query);
        $result->execute([$proname , $price , $prodesc , $img]);
        return true;

        // $name = isset($_POST['proname']) ? $_POST['proname'] : '';
        // $desc = isset($_POST['prodesc']) ? $_POST['prodesc'] : '';
        // $$price = isset($_POST['price']) ? $_POST['price'] : '';
        // $created = isset($_POST['createdـat']) ? $_POST['createdـat'] : date('Y-m-d H:i:s');
        // $stmt = $pdo->prepare('INSERT INTO products VALUES (?, ?, ?, ?)');
        // $stmt->execute([$name ,$desc , $price ,$created]);
    }
    //update 


    function update ( $name ,$desc , $price ,$created ){


        $stmt = $this->connect();
        $query = "UPDATE {$products} SET proname=?, prodesc=?, price=? WHERE id=? ";
        $stmt= $stmt->prepare($query);
        $stmt->execute([$proname ,  $prodesc , $price , $id]);
        return true;
            
        
        
}








    //delete

    function delete($id)
    {
        $stmt = $this->connect();
        $query = "delete from  products where id=:id";
        $stmt= $stmt->prepare($query);
        $stmt->execute([":id" => $id]);
        return true;
    }
}