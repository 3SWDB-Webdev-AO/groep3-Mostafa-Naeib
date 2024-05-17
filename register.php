<?php include 'lib/header.php'; ?>

<main class="log-container">
    <h1 class="log-kop">Register</h1>
    <section class="bom">
        <form action="connect.php" method="POST">
            <div class="form-group">
                <label for="firstName">Voornaam</label>
                <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Hans" />
            </div>
            <div class="form-group">
                <label for="lastName">Achternaam</label>
                <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Emmerik" />
            </div>
            <div class="form-group">
                <label for="gender">Geslacht</label>
                <div class="gender-container">
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="m" id="male" />
                        Man
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="f" id="female" />
                        Vrouw
                    </label>
                    <label class="radio-inline">
                        <input type="radio" name="gender" value="o" id="others" />
                        Anders
                    </label>
                </div>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="info@gmail.com" />
            </div>
            <div class="form-group">
                <label for="password">Wachtwoord</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="123456" />
            </div>
            <div class="form-group">
                <label for="number">Telefoonnummer</label>
                <input type="tel" class="form-control" id="number" name="number" placeholder="+31 6836464" />
            </div>
            <div class="form-group">
                <label for="datumVanVandaag">Datum van vandaag</label>
                <input type="date" class="form-control" id="datumVanVandaag" name="datumVanVandaag" />
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Register" />
            </div>
        </form>
    </section>
</main>
<?php include 'lib/footer.php'; ?>
