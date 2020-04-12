<style>
.form-control {
	padding: 6px 12px 5px 5px;
}
</style>
<h4>Filter results</h4>
						<form method="post" action="listings.php" class="nopadding nomargin">
							<div class="col-md-12 nopadding">
							<label>Product Type</label>
							</div>
							<div class="col-md-6 nopadding">
							<!-- radio -->
							<label class="radio" style="font-weight:normal;">
								<input type="radio" name="product_type" value="used" checked="checked">
								<i></i> Used
							</label>
							</div>
							<div class="col-md-6 nopadding">
							<!-- radio -->
							<label class="radio" style="font-weight:normal;">
								<input type="radio" name="product_type" value="new" checked="checked">
								<i></i> New
							</label>
							</div>
							<div class="clearboth margin-bottom-10"></div>
							
							<div class="col-md-12 nopadding">
							<label>Sub Category</label>
							<select name="subcategory" class="form-control">
							<option value="--">Any Categories</option>
							<option value="140" selected="selected">Used Cars for Sale</option>
							<option value="141">Auto Accessories &amp; Parts</option>
							<option value="229">Boats</option>
							<option value="2122">Heavy Vehicles</option>
							<option value="890">Motorcycles</option>
							<option value="2395">Number Plates</option>
							</select>
							</div>
							<div class="clearboth margin-bottom-10"></div>
							<div class="col-md-12 nopadding">
							<label>Make</label>
							<select name="make" class="form-control">
							<option value="--">Any Makes</option>
							<option value="1167">Acura</option>
							<option value="1173">Alfa Romeo</option>
							<option value="1180">Aston Martin</option>
							<option value="1185">Audi</option>
							<option value="2307">BAIC</option>
							<option value="1202">BMW</option>
							<option value="1196">Bentley</option>
							<option value="1200">Bizzarrini</option>
							<option value="2512">Borgward</option>
							<option value="2299">Brilliance</option>
							<option value="1220">Bufori</option>
							<option value="1222">Bugatti</option>
							<option value="1224">Buick</option>
							<option value="1802">CMC</option>
							<option value="1226">Cadillac</option>
							<option value="2287">Caterham</option>
							<option value="2325">Changan</option>
							<option value="2391">Chery</option>
							<option value="1235">Chevrolet</option>
							<option value="1255">Chrysler</option>
							<option value="1826">Citroen</option>
							<option value="1264">Daewoo</option>
							<option value="1268">Daihatsu</option>
							<option value="2530">Datsun</option>
							<option value="1274">DeLorean</option>
							<option value="1276">Dodge</option>
							<option value="2373">Equus</option>
							<option value="2542">Fenyr</option>
							<option value="1287">Ferrari</option>
							<option value="1289">Fiat</option>
							<option value="2109">Fisker</option>
							<option value="2387">Force</option>
							<option value="1294">Ford</option>
							<option value="2275">Foton</option>
							<option value="2570">GAC</option>
							<option value="2022">GAC Gonow</option>
							<option value="1315">GMC</option>
							<option value="2295">Geely</option>
							<option value="2389">Grand Tiger</option>
							<option value="2508">Gumpert</option>
							<option value="2554">Haval</option>
							<option value="1324">Honda</option>
							<option value="1337">Hummer</option>
							<option value="1341">Hyundai</option>
							<option value="1354">Infiniti</option>
							<option value="1363">Isuzu</option>
							<option value="2023">JAC</option>
							<option value="2020">JMC</option>
							<option value="1373">Jaguar</option>
							<option value="1386">Jeep</option>
							<option value="2021">Jinbei</option>
							<option value="2449">KTM</option>
							<option value="1393">Kia</option>
							<option value="2191">Koenigsegg</option>
							<option value="1834">Lada</option>
							<option value="1403">Lamborghini</option>
							<option value="1627">Lancia</option>
							<option value="1408">Land Rover</option>
							<option value="1415">Lexus</option>
							<option value="1424">Lincoln</option>
							<option value="1430">Lotus</option>
							<option value="2280">Luxgen</option>
							<option value="2213">MG</option>
							<option value="1479">MINI</option>
							<option value="2470">Mahindra</option>
							<option value="1434">Maserati</option>
							<option value="2544">Maxus</option>
							<option value="1439">Maybach</option>
							<option value="1442">Mazda</option>
							<option value="1456">McLaren</option>
							<option value="1459">Mercedes-Benz</option>
							<option value="1633">Mercury</option>
							<option value="2537">Milan</option>
							<option value="1481">Mitsubishi</option>
							<option value="2235">Morgan</option>
							<option value="2562">Morris</option>
							<option value="1495">Nissan</option>
							<option value="1513">Opel</option>
							<option value="1840">Oullim</option>
							<option value="2244">Pagani</option>
							<option value="1520">Peugeot</option>
							<option value="1870">Pontiac</option>
							<option value="1530">Porsche</option>
							<option value="1825">Proton</option>
							<option value="1537">Renault</option>
							<option value="1541">Rolls Royce</option>
							<option value="1544">Rover</option>
							<option value="1546">Saab</option>
							<option value="1553">Seat</option>
							<option value="2024">Shenlong/Sunlong</option>
							<option value="1560">Skoda</option>
							<option value="1564">Smart</option>
							<option value="1836">Speranza</option>
							<option value="1566">Ssang Yong</option>
							<option value="1568">Subaru</option>
							<option value="1575">Suzuki</option>
							<option value="1580">TATA</option>
							<option value="2262">Tesla</option>
							<option value="1584">Toyota</option>
							<option value="2426">UAZ</option>
							<option value="1604">Volkswagen</option>
							<option value="1615">Volvo</option>
							<option value="2504">W Motors</option>
							<option value="1939">Wiesmann</option>
							</select>
							</div>
							<div class="clearboth margin-bottom-10"></div>
							<div class="col-md-12 nopadding">
							<label>Model</label>
							<select name="model" class="form-control">
							<option value="--">Any Models</option>
							<option value="1325">Accord</option>
							<option value="1326">City</option>
							<option value="1327">Civic</option>
							<option value="1328">Prelude</option>
							<option value="1329">S2000</option>
							<option value="1330">Odyssey</option>
							<option value="1331">CR-V</option>
							<option value="1332">Element</option>
							<option value="1333">HR-V</option>
							<option value="1334">MR-V</option>
							<option value="1335">Pickup</option>
							<option value="1336">Van</option>
							<option value="1758">Jazz</option>
							<option value="1785">Pilot</option>
							<option value="1794">Legend</option>
							<option value="1951">Other</option>
							<option value="2345">Fit</option>
							<option value="2372">Crosstour</option>
							</select>
							</div>
							<div class="clearboth margin-bottom-10"></div>
							<div class="col-md-12 nopadding">
							<label>Seller Type</label>
							<select name="subcategory" class="form-control">
							<option value="--">Any Seller</option>
							<option value="1325">Individual</option>
							<option value="1326">Dealer or Company</option>
							</select>
							</div>
							<div class="clearboth margin-bottom-10"></div>
							
							<div class="col-md-12 nopadding">
							<label>Price</label>
							</div>
							<div class="col-md-6 nopadding">
							<input type="text" placeholder="Price from" name="minprice" class="form-control" />
							</div>
							<div class="col-md-6 nopadding">
							<input type="text" placeholder="Price to" name="maxprice" class="form-control" />
							</div>
							<div class="clearboth margin-bottom-10"></div>
							<div class="col-md-12 nopadding">
							<label>Year</label>
							</div>
							<div class="col-md-6 nopadding">
							<select name="minyear" class="form-control">
							<option value="--">Year from</option>
							<option value="2020">2020</option>
							<option value="2019">2019</option>
							<option value="2018">2018</option>
							<option value="2017">2017</option>
							<option value="2016">2016</option>
							<option value="2015">2015</option>
							<option value="2014">2014</option>
							<option value="2013">2013</option>
							<option value="2012">2012</option>
							<option value="2011">2011</option>
							<option value="2010">2010</option>
							<option value="2009">2009</option>
							<option value="2008">2008</option>
							<option value="2007">2007</option>
							<option value="2006">2006</option>
							<option value="2005">2005</option>
							<option value="2004">2004</option>
							<option value="2003">2003</option>
							<option value="2002">2002</option>
							<option value="2001">2001</option>
							<option value="2000">2000</option>
							<option value="1999">1999</option>
							<option value="1998">1998</option>
							<option value="1997">1997</option>
							<option value="1996">1996</option>
							<option value="1995">1995</option>
							<option value="1994">1994</option>
							<option value="1993">1993</option>
							<option value="1992">1992</option>
							<option value="1991">1991</option>
							<option value="1990">1990</option>
							<option value="1989">1989</option>
							<option value="1988">1988</option>
							<option value="1987">1987</option>
							<option value="1986">1986</option>
							<option value="1985">1985</option>
							<option value="1984">1984</option>
							<option value="1983">1983</option>
							<option value="1982">1982</option>
							<option value="1981">1981</option>
							<option value="1980">1980</option>
							<option value="1979">1979</option>
							<option value="1978">1978</option>
							<option value="1977">1977</option>
							<option value="1976">1976</option>
							<option value="1975">1975</option>
							<option value="1974">1974</option>
							<option value="1973">1973</option>
							<option value="1972">1972</option>
							<option value="1971">1971</option>
							<option value="1970">1970</option>
							<option value="1969">1969</option>
							<option value="1968">1968</option>
							<option value="1967">1967</option>
							<option value="1966">1966</option>
							<option value="1965">1965</option>
							<option value="1964">1964</option>
							<option value="1963">1963</option>
							<option value="1962">1962</option>
							<option value="1961">1961</option>
							<option value="1960">1960</option>
							<option value="1959">1959</option>
							<option value="1958">1958</option>
							<option value="1957">1957</option>
							<option value="1956">1956</option>
							<option value="1955">1955</option>
							<option value="1954">1954</option>
							<option value="1953">1953</option>
							<option value="1952">1952</option>
							<option value="1951">1951</option>
							<option value="1950">1950</option>
							<option value="1949">1949</option>
							<option value="1948">1948</option>
							<option value="1947">1947</option>
							<option value="1946">1946</option>
							<option value="1945">1945</option>
							<option value="1944">1944</option>
							<option value="1943">1943</option>
							<option value="1942">1942</option>
							<option value="1941">1941</option>
							<option value="1940">1940</option>
							<option value="1939">1939</option>
							<option value="1938">1938</option>
							<option value="1937">1937</option>
							<option value="1936">1936</option>
							<option value="1935">1935</option>
							<option value="1934">1934</option>
							<option value="1933">1933</option>
							<option value="1932">1932</option>
							<option value="1931">1931</option>
							<option value="1930">1930</option>
							<option value="1929">1929</option>
							<option value="1928">1928</option>
							<option value="1927">1927</option>
							<option value="1926">1926</option>
							<option value="1925">1925</option>
							<option value="1924">1924</option>
							<option value="1923">1923</option>
							<option value="1922">1922</option>
							<option value="1921">1921</option>
							<option value="1920">1920</option>
							</select>
							</div>
							<div class="col-md-6 nopadding">
							<select name="minyear" class="form-control">
							<option value="--">Year to</option>
							<option value="2020">2020</option>
							<option value="2019">2019</option>
							<option value="2018">2018</option>
							<option value="2017">2017</option>
							<option value="2016">2016</option>
							<option value="2015">2015</option>
							<option value="2014">2014</option>
							<option value="2013">2013</option>
							<option value="2012">2012</option>
							<option value="2011">2011</option>
							<option value="2010">2010</option>
							<option value="2009">2009</option>
							<option value="2008">2008</option>
							<option value="2007">2007</option>
							<option value="2006">2006</option>
							<option value="2005">2005</option>
							<option value="2004">2004</option>
							<option value="2003">2003</option>
							<option value="2002">2002</option>
							<option value="2001">2001</option>
							<option value="2000">2000</option>
							<option value="1999">1999</option>
							<option value="1998">1998</option>
							<option value="1997">1997</option>
							<option value="1996">1996</option>
							<option value="1995">1995</option>
							<option value="1994">1994</option>
							<option value="1993">1993</option>
							<option value="1992">1992</option>
							<option value="1991">1991</option>
							<option value="1990">1990</option>
							<option value="1989">1989</option>
							<option value="1988">1988</option>
							<option value="1987">1987</option>
							<option value="1986">1986</option>
							<option value="1985">1985</option>
							<option value="1984">1984</option>
							<option value="1983">1983</option>
							<option value="1982">1982</option>
							<option value="1981">1981</option>
							<option value="1980">1980</option>
							<option value="1979">1979</option>
							<option value="1978">1978</option>
							<option value="1977">1977</option>
							<option value="1976">1976</option>
							<option value="1975">1975</option>
							<option value="1974">1974</option>
							<option value="1973">1973</option>
							<option value="1972">1972</option>
							<option value="1971">1971</option>
							<option value="1970">1970</option>
							<option value="1969">1969</option>
							<option value="1968">1968</option>
							<option value="1967">1967</option>
							<option value="1966">1966</option>
							<option value="1965">1965</option>
							<option value="1964">1964</option>
							<option value="1963">1963</option>
							<option value="1962">1962</option>
							<option value="1961">1961</option>
							<option value="1960">1960</option>
							<option value="1959">1959</option>
							<option value="1958">1958</option>
							<option value="1957">1957</option>
							<option value="1956">1956</option>
							<option value="1955">1955</option>
							<option value="1954">1954</option>
							<option value="1953">1953</option>
							<option value="1952">1952</option>
							<option value="1951">1951</option>
							<option value="1950">1950</option>
							<option value="1949">1949</option>
							<option value="1948">1948</option>
							<option value="1947">1947</option>
							<option value="1946">1946</option>
							<option value="1945">1945</option>
							<option value="1944">1944</option>
							<option value="1943">1943</option>
							<option value="1942">1942</option>
							<option value="1941">1941</option>
							<option value="1940">1940</option>
							<option value="1939">1939</option>
							<option value="1938">1938</option>
							<option value="1937">1937</option>
							<option value="1936">1936</option>
							<option value="1935">1935</option>
							<option value="1934">1934</option>
							<option value="1933">1933</option>
							<option value="1932">1932</option>
							<option value="1931">1931</option>
							<option value="1930">1930</option>
							<option value="1929">1929</option>
							<option value="1928">1928</option>
							<option value="1927">1927</option>
							<option value="1926">1926</option>
							<option value="1925">1925</option>
							<option value="1924">1924</option>
							<option value="1923">1923</option>
							<option value="1922">1922</option>
							<option value="1921">1921</option>
							<option value="1920">1920</option>
							</select>
							</div>
							<div class="clearboth margin-bottom-10"></div>
							<div class="col-md-12 nopadding">
							<label>Transmission</label>
							<select name="model" class="form-control">
							<option value="--">Any Transmission</option>
							<option value="1325">Automatic</option>
							<option value="1326">Manual</option>
							</select>
							</div>
							<div class="clearboth margin-bottom-10"></div>
							<div class="col-md-12 nopadding">
							<label>Kilometers</label>
							</div>
							<div class="col-md-6 nopadding">
							<input type="text" placeholder="KM from" name="kmfrom" class="form-control" />
							</div>
							<div class="col-md-6 nopadding">
							<input type="text" placeholder="KM to" name="kmto" class="form-control" />
							</div>
							<div class="clearboth margin-bottom-10"></div>
							<div class="col-md-12 nopadding">
							<label>Engine Power</label>
							</div>
							<div class="col-md-6 nopadding">
							<input type="text" placeholder="CC from" name="ccfrom" class="form-control" />
							</div>
							<div class="col-md-6 nopadding">
							<input type="text" placeholder="CC to" name="ccto" class="form-control" />
							</div>
							<div class="clearboth margin-bottom-20"></div>
							<div class="col-md-12 nopadding">
							<button type="submit" class="btn btn-black block" style="width: 100%;"><i class="fa fa-search"></i> Search Again</button>
							</div>
						</form>
						