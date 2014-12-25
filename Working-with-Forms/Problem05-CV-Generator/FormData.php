<html>
<head>
    <title>CV Generator</title>
    <style>
        fieldset {
            width: 680px;
        }
    </style>
</head>
<body>
    <form action="CV.php" method="POST">
        <fieldset>
            <legend>Personal Information</legend>
            <input type="text" placeholder="First Name" name="firstName"/><br />
            <input type="text" placeholder="Last Name" name="lastName"/><br />
            <input type="email" placeholder="Email" name="email"/><br />
            <input type="tel" placeholder="Phone Number" name="phone"/><br />
            <label for="female">Female</label><input type="radio" id="female" name="gender" value="female"/>
            <label for="male">Male</label><input type="radio" id="male" name="gender" value="male"/><br />
            <label>Birth Date</label><br /><input type="date" placeholder="dd/mm/yyyy" name="birthDay"/><br />
            <label>Nationality</label><br />
            <input type="text" list="nationalityList" name="nationality">
            <datalist id="nationalityList">
                <option value="bulgarian">Bulgarian</option>
                <option value="american">American</option>
            </datalist>
        </fieldset>
        <fieldset>
            <legend>Last Work Position</legend>
            <label>Company Name</label><input type="text" name="company"/><br />
            <label>From</label><input type="date" placeholder="dd/mm/yyyy" name="dateFrom"/><br />
            <label>To</label><input type="date" placeholder="dd/mm/yyyy" name="dateTo"/>
        </fieldset>
        <fieldset>
            <legend>Computer Skills</legend>
            <div id="computerLanguages">
                <div>
                    <input type="text" name="compLanguage[]"/><select name ="level[]">
                        <option value="beginner">beginner</option>
                        <option value="programmer">programmer</option>
                        <option value="ninja">ninja</option>
                    </select>
                </div>
            </div>
            <button type="button" id="removeCompLanguage">Remove Language</button>
            <button type="button" id="addCompLanguage">Add Language</button>
        </fieldset>
        <fieldset>
            <legend>Other Skills</legend>
            <div id="languages">
                <div>
                    <input type="text" name="language[]"/><select name ="comprehension[]">
                        <option disabled>Comprehension</option>
                        <option value="beginner">beginner</option>
                        <option value="intermediate">intermediate</option>
                        <option value="advanced">advanced</option>
                    </select><select name ="reading[]">
                        <option disabled>Reading</option>
                        <option value="beginner">beginner</option>
                        <option value="intermediate">intermediate</option>
                        <option value="advanced">advanced</option>
                    </select><select name ="writing[]">
                        <option disabled>Writing</option>
                        <option value="beginner">beginner</option>
                        <option value="intermediate">intermediate</option>
                        <option value="advanced">advanced</option>
                    </select>
                </div>
            </div>
            <button type="button" id="removeLanguage">Remove Language</button>
            <button type="button" id="addLanguage">Add Language</button><br />
            <label for="a">A</label><input type="checkbox" name="driverLicenseA" value="A" id="a"/>
            <label for="b">B</label><input type="checkbox" name="driverLicenseB" value="B" id="b"/>
            <label for="c">C</label><input type="checkbox" name="driverLicenseC" value="C" id="c"/>
        </fieldset>
        <input type="submit" value="Generate CV"/>
    </form>
    <script>

        function createSelect(name, values, innerHtmls) {
            var select = document.createElement('select');
            select.name = name;

            var len = values.length;
            for(var i = 0 ; i < len ; i += 1) {
                var option = document.createElement('option');
                option.value = values[i];
                option.innerHTML = innerHtmls[i];
                select.appendChild(option);
            }

            return select;
        }

        function createComputerLanguage() {

            var computerLanguageBox = document.createElement('div');
            var compLanguage = document.createElement('input');
            compLanguage.name = 'compLanguage[]';
            computerLanguageBox.appendChild(compLanguage);
            computerLanguageBox.appendChild(createSelect('level[]', ['beginner', 'programmer', 'ninja'], ['beginner', 'programmer', 'ninja']));

            return computerLanguageBox;
        }

        var addCompLanguage = document.getElementById('addCompLanguage');
        addCompLanguage.onclick = function () {
            document.getElementById('computerLanguages').appendChild(createComputerLanguage());
        };

        var removeCompLanguage = document.getElementById('removeCompLanguage');
        removeCompLanguage.onclick = function () {
            var computerLanguages = document.getElementById('computerLanguages');
            computerLanguages.removeChild(computerLanguages.lastChild);
        };

        function createLanguage() {

            var languageBox = document.createElement('div');

            var language = document.createElement('input');
            language.name = 'language[]';
            languageBox.appendChild(language);
            languageBox.appendChild(createSelect('comprehension[]', ['beginner', 'intermediate', 'advanced'], ['beginner', 'intermediate', 'advanced']));
            languageBox.appendChild(createSelect('reading[]', ['beginner', 'intermediate', 'advanced'], ['beginner', 'intermediate', 'advanced']));
            languageBox.appendChild(createSelect('writing[]', ['beginner', 'intermediate', 'advanced'], ['beginner', 'intermediate', 'advanced']));

            return languageBox;
        }

        var addLanguage = document.getElementById('addLanguage');
        addLanguage.onclick = function () {
            var languages = document.getElementById('languages');
            languages.appendChild(createLanguage());
        };

        var removeLanguage = document.getElementById('removeLanguage');
        removeLanguage.onclick = function () {
            var languages = document.getElementById('languages');
            languages.removeChild(languages.lastChild);
        };

    </script>
</body>
</html>


