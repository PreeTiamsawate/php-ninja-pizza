<?php
include('./config/db_connect.php');

//write query for all pizzas
$sql = 'SELECT title, ingredients, id,created_at FROM pizzas ORDER BY created_at';

//make query and get result
$result = mysqli_query($conn, $sql);

//fetch the resulting row as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

//free memory and close the connection
mysqli_free_result($result);
mysqli_close($conn);

print_r($pizzas);
?>

<!DOCTYPE html>
<html>

<?php $PageTitle = 'HOME'; ?>
<?php include('templates/header.php'); ?>
<h4 class="center grey-text">Pizzas!</h4>

<div class="container">
	<div class="row">

		<?php foreach ($pizzas as $pizza) : ?>

			<div class="col s6 md3">
				<div class="card z-depth-0">
					<div class="card-content center">
						<h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
						<ul>
							<?php foreach(explode(',',$pizza['ingredients'])  as $ing):?>
								<li><?php echo htmlspecialchars($ing); ?></li>
							<?php endforeach; ?>
						</ul>
						<div><?php echo htmlspecialchars($pizza['ingredients']); ?></div>
						<div><?php echo explode(" ", htmlspecialchars($pizza['created_at']))[1]; ?></div>
					</div>
					<div class="card-action right-align">
						<a class="brand-text" href="#">more info</a>
					</div>
				</div>
			</div>

		<?php endforeach; ?>

	</div>
</div>

<?php include('templates/footer.php'); ?>

</html>