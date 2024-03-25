<?php
session_start();
include("db.php");

$pagename = "Smart Basket";
echo "<link rel=stylesheet type=text/css href=mystylesheet.css>";

echo "<title>" . $pagename . "</title>";

echo "<body>";

include("headfile.html");

echo "<h4>" . $pagename . "</h4>";

// Check if the product id to be deleted is set
if (isset($_POST['del_prodid'])) {
    $delprodid = $_POST['del_prodid'];
    
    // Unset the cell of the session for the posted product id variable
    if (isset($_SESSION['basket'][$delprodid])) {
        unset($_SESSION['basket'][$delprodid]);
        echo "<p>1 item removed from the basket</p>";
    } else {
        echo "<p>Product not found in the basket</p>";
    }
}

if (isset($_POST['h_prodid'])) {
    $newprodid = $_POST['h_prodid'];
    $reququantity = $_POST['quantity'];

    $_SESSION['basket'][$newprodid] = $reququantity;
    echo "<p>1 item added</p>";
} else {
    // echo "<p>Basket unchanged</p>";
}

$total = 0;

echo "<table border='1'>
            <tr>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Subtotal</th>
                <th>Remove Product</th>
            </tr>";

if (isset($_SESSION['basket'])) {
    foreach ($_SESSION['basket'] as $index => $value) {
        $theSQL = "SELECT prodId, prodName, prodPrice FROM Product WHERE prodId = ?";
        if ($stmt = $conn->prepare($theSQL)) {
            $stmt->bind_param("i", $index);
            $stmt->execute();
            $result = $stmt->get_result();
            if ($result->num_rows > 0) {
                $arrayp = $result->fetch_assoc();

                $subtotal = $arrayp['prodPrice'] * $value;
                $total += $subtotal;

                echo "<tr>";
                echo "<td>" . htmlspecialchars($arrayp['prodName']) . "</td>";
                echo "<td>" . htmlspecialchars($arrayp['prodPrice']) . "</td>";
                echo "<td>" . htmlspecialchars($value) . "</td>";
                echo "<td>" . htmlspecialchars($subtotal) . "</td>";
                echo "<td>
                        <form method='post' action='basket.php'>
                            <input type='hidden' name='del_prodid' value='$index'>
                            <button type='submit'>Remove</button>
                        </form>
                      </td>";

                echo "</tr>";
            }
            $stmt->close();
        } else {
            echo "Error preparing statement: " . $conn->error;
        }
    }
    echo "<tr>
            <td colspan='3' style='text-align:right;'><strong>Total:</strong></td>
            <td>" . htmlspecialchars($total) . "</td>
          </tr>";
    echo "</table>";
} else {
    echo "<p>Your basket is empty.</p>";
    echo "</br></br>";
    echo "</table>";
}

echo "</br></br>";
echo '<a href="./clearbasket.php">CLEAR BASKET</a>';
echo "</br></br>";

echo '<p>New hometeq customers: <a href="./signup.php">Sign Up</a></p>';
echo "</br>";
echo '<p>Returning hometeq customers: <a href="./login.php">Login</a></p>';

include("footfile.html");

echo "</body>";
?>
