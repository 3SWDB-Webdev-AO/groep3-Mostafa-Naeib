<main class="log-container">
    <h1 class="log-kop">Register</h1>
    <section class="bom">
<form action="connect.php" method="Post">
    <div>
        <label for="firstName">Voornaam</label>
        <input type="text" class="form-control" id="firstName" name="firstName" placeholder="Hans"/>
    </div>
    <div>
        <label for="lastName">Achternaam</label>
        <input type="text" class="form-control" id="lastName" name="lastName" placeholder="emmerik"/>
    </div>
        <label for="gender">Geslacht</label>
    <div class="gender-container">
        <label for="male" class="radio-inline">
            <input type="radio" name="gender" value="m" id="male" />
            Man
        </label>

        <label for="female" class="radio-inline">
            <input type="radio" name="gender" value="f" id="female" />
            Vrouw
        </label>

        <label for="others" class="radio-inline">
            <input type="radio" name="gender" value="o" id="others" />
            Anders
        </label>
    </div>
    <div>
        <label for="email">Email</label>
        <input type="text" class="form-control" id="email" name="email" placeholder="info@gmail.com"/>
    </div>
    <div>
        <label for="password">Wachtwoord</label>
        <input type="password" class="form-control" id="password" name="password" placeholder="123456"/>
    </div>
    <div>
        <label for="number">Telefoonnummer</label>
        <input type="number" class="form-control" id="number" name="number" placeholder="+31 6836464"/>
    </div>
    <div>
        <label for="datumVanVandaag">Datum van vandaag</label>
        <input type="date" class="form-control" id="datumVanVandaag" name="datumVanVandaag" />
    </div>
        <input type="submit" class="btn btn-primary" />
    </section>
</form>