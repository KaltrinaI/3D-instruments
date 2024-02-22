<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InstrumentsInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('instruments_info')->insert(
            [
                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/accguit.glb',
                    'preview' =>'images/accguit.png',
                    'name' => "Yamaha FG800",
                    'credit_card_number' => base64_encode(378282246310005),
                    'details' => "A standard design and a traditional look come together in one of the best rated acoustic guitars which is available at a very affordable price. The Yamaha FG800 gives you comfort in tune with your needs. This is another addition to Yamaha's esteemed FG series. The focus was always to produce a high-quality musical instrument with explicit playability and outstanding tuning without a punching a hole in your wallet. The FG series has always been considered a classic choice amongst millions of guitarists for the past 50 years. The FG800 is a continuation of the series and offers even more refined playability along with features that are a class apart. It has always been a symbol of assurance to professionals and has never failed to strike the perfect tone of expectation with contemporary musicians.",
                    'price' => 56.08,
                    'in_store' => 8,
                    'instrument_family' => 3,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/cello.glb',
                    'preview' => 'images/cello.png',
                    'name' => "Cecilio CCO-100",
                    'credit_card_number' => base64_encode(371449635398531),
                    'details' => "For those looking for everything they need in one package, the Cecilio CCO-100 is the way to go. Included with this option are strings, a bridge, a stand, a decent-quality Brazilwood bow, and both a hard and soft case to boot.",
                    'price' => 456.85,
                    'in_store' => 3,
                    'instrument_family' => 3,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/guit.glb',
                    'preview' => 'images/guit.png',
                    'name' => "Jasmine S35",
                    'credit_card_number' => base64_encode(371449635456431),
                    'details' => "This is a dreadnought guitar with a great look and a resounding, bold sound. Its one of the best guitars for its price because it has more features than a lot of popular guitars. This is a well-built guitar that is easy to play. It comes with a spruce top and agathis back and sides which add to its beauty. It is a versatile, convenient, and durable musical tool that can be used for extended periods of time. It has a satin neck finish which not only looks great but maximizes resonance for optimal sound quality and easy playability. Its bridge and fingerboards are made of rosewood and so are its chrome tuners and body binding.",
                    'price' => 385.89,
                    'in_store' => 3,
                    'instrument_family' => 3,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/guit1.glb',
                    'preview' => 'images/guit1.png',
                    'name' => "Epiphone DR-100",
                    'credit_card_number' => base64_encode(371852635398431),
                    'details' => "This fantastic guitar has a mahogany body which not only makes it sturdier but also increases the quality of sound and resonance that the guitar produces. It is notable for producing a more natural resonance and optimum sound quality. It has a select spruce top and a 25.5 scale. It has the look, the sound and the build quality that first-time players, as well as professionals, prefer in their musical instrument. It has a dreadnought shape which is great for bluegrass, folk, rock, country and all the music genres in between. The dreadnought allows a well-balanced sound system in which you can either lessen or increase the volume of your playing. It comes from one of America’s most respected instrument makers, Epiphone.",
                    'price' => 485.36,
                    'in_store' => 1,
                    'instrument_family' => 3,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/violin.glb',
                    'preview' => 'images/violin.png',
                    'name' => "Stentor 1500 4/4",
                    'credit_card_number' => base64_encode(5610591088525250),
                    'details' => "When it comes to beginner violins, you will hardly find a better brand to turn to other than Stentor. They've been in the business for over 100 years now, which allowed them to build a formidable reputation. Sure, there are many violins on the market which feature better build quality and tonewood selection from Stentor, but none that you can get in the same price range as Stentor. Here we're looking at their 1500 4/4 violin, which has proven to be one of the go-to beginner models.",
                    'price' => 367.99,
                    'in_store' => 5,
                    'instrument_family' => 3,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/lpharp.glb',
                    'preview' => 'images/lpharp.png',
                    'name' => "Pixie Harp Tm, 19 Strings",
                    'credit_card_number' => base64_encode(376549635398431),
                    'details' => "One of the best features of the Pixie Harp is that it is made with authentic materials. It is beautiful to look at and offers complete value for money with its reasonable price tag. The harp can be a perfect purchase if you are an aspiring musician or want to gift it to someone among your loved ones who want to learn to play the harp. The height of the harp is approximately 31”. It comes with 19 sharpening levels and has the same number of DuPont hard nylon strings. The engraved and inlaid frame of rosewood further enhances the beauty of harp. Moreover, it provides exceptional sound quality and strength due to the birch soundboard.",
                    'price' => 6428.77,
                    'in_store' => 2,
                    'instrument_family' => 3,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/mharp.glb',
                    'preview' => 'images/mharp.png',
                    'name' => "Heather Harp TM, 22 Strings, Vine Design",
                    'credit_card_number' => base64_encode(371412365398431),
                    'details' => "Standing tall at 36” high, the Heather Harp TM, 22 Strings, Vine Design from Roosebeck is one of the most popular harps out there. It features 22 DuPont hard nylon strings, along with 22 sharpening level, which allows superior quality and melodious sound. Moreover, it boasts of range from C3 to C6 and comes in a beautifully engraved and inlaid frame made of Sheesham, which gives it classiest look. The harp also features a birch plywood soundboard for outstanding sound quality and strength.",
                    'price' => 7864.99,
                    'in_store' => 6,
                    'instrument_family' => 3,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/clarinet.glb',
                    'preview' => 'images/clarinet.png',
                    'name' => "BACKUN Alpha Plus Bb Grenadilla Clarinet",
                    'credit_card_number' => base64_encode(371412365398431),
                    'details' => "The Alpha Plus Wood Clarinet delivers on Backun’s commitment to quality and exceptional value. Featuring unstained grenadilla wood with a unique barrel and bell design, this model is crafted from advanced machining and finishing techniques, resulting in a consistent instrument that is playable out of the box. With a comfortable blowing resistance and an ergonomic key work mechanism, moving up to the Alpha Plus Clarinet is a breeze. Water-resistant custom black leather pads, an adjustable thumb rest with a neck strap ring and an ABS case round out an impressive list of features at an even more impressive price. The whole package includes a mouthpiece kit featuring the newly designed Backun Protégé Mouthpiece, Rovner Dark Ligature and Cap, and one Légère Signature Reed.",
                    'price' => 1596.96,
                    'in_store' => 5,
                    'instrument_family' => 4,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/flute.glb',
                    'preview' => 'images/flute.png',
                    'name' => "Pearl Flutes PFP-105 Grenaditte",
                    'credit_card_number' => base64_encode(371412365398431),
                    'details' => "The PFP105E flute is made of grenaditte and designed to match the tonal characteristics of grenadilla wood. Its sound is warm and full of rich overtones, and grenaditte avoids any cracking concerns. The bubble-style head joint helps focus the sound and emphasizes a stronger core to the overall tone. Excellent projection, quick response and a strong upper register are all performance characteristics of this fine flute.",
                    'price' => 1351.00,
                    'in_store' => 2,
                    'instrument_family' => 4,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/flute1.glb',
                    'preview' => 'images/flute1.png',
                    'name' => "Yamaha YPC-81 Professional Flute Traditional Headjoint",
                    'credit_card_number' => base64_encode(371412365398431),
                    'details' => "Ribbed key post construction results in greater body strength and accurate key action and a pplit E mechanism produces a clearer and more responsive high E. This beautiful instrument is entirely handcrafted by the expert flute makers at Yamaha.",
                    'price' => 3899.99,
                    'in_store' => 3,
                    'instrument_family' => 4,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/bason.glb',
                    'preview' => 'images/bason.png',
                    'name' => "Fox Renard Model 41 Bassoon Standard",
                    'credit_card_number' => base64_encode(371412365398431),
                    'details' => "Crafted from molded polypropylene, the Fox 41 is designed to withstand the rigors of daily practice and travel. Complete with a full German key system including silver-plated keys, it provides a responsive mechanism for developing proper technique and control. Two included C bocals, a hand rest, neck strap, seat strap, cleaning cloth and swabs round out the complete package for beginners. Brought to you by the experts at Fox Products, the Renard Model 41 bassoon delivers a high-quality, affordable option to launch a lifetime of music.",
                    'price' => 7400.00,
                    'in_store' => 1,
                    'instrument_family' => 4,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/picol.glb',
                    'preview' => 'images/picol.png',
                    'name' => "Pearl PFP-105 Grenaditte Piccolo Standard",
                    'credit_card_number' => base64_encode(371412365398431),
                    'details' => "The Pearl PFP-105E piccolo combines traditional craftsmanship with cutting-edge design. Its Grenaditte headjoint and body provide the weight, appearance, and timbre of wood, with the added benefit of stability in any climate. This revolutionary instrument is perfect for flutists seeking an affordable yet professional quality piccolo.",
                    'price' => 999.99,
                    'in_store' => 2,
                    'instrument_family' => 4,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/ltuba.glb',
                    'preview' => 'images/ltuba.png',
                    'name' => "Stagg WS BT235 Bb Tuba with Case",
                    'credit_card_number' => base64_encode(852449635378431),
                    'details' => "The Stagg BT235, like most of its sister versions, features a lacquer body finish and simple mechanism that makes it easy for the beginner player to play. The Stagg WS – BT235 is a tuba which features a solid and intuitive 3 front-action nickel silver pistons that have a bore measuring 15.0 in diameter while the bell range in inches is 147.64. This tuba is designed with water key to provide a comfortable and smooth playing experience. The height of the Stagg WS BT235 is 39.37 inches, which is ideal for players looking for a smaller instrument to play. The Stagg WS BT235 tuba also comes with a silver plated mouthpiece and a soft wheeled case that has a backpack strap for easy storage and transport.",
                    'price' => 586.69,
                    'in_store' => 5,
                    'instrument_family' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/trmpet.glb',
                    'preview' => 'images/trmpet.png',
                    'name' => "Jupiter Professional XO Series Bb Trumpet with Reverse Lead pipe",
                    'credit_card_number' => base64_encode(5557555555554444),
                    'details' => "The trumpet features a mid size-large bore design that measures 459 inches in size. The bell is hand-crafted and measures 4.8 inches while featuring a rose brass design. The lead pipe of this instrument also features a standard rose brass design, and on top are Monel pistons, with 2-piece valve casing. All of these combines to render a glorious and unique sound those professional instruments are expected to offer. Perfect tuning is guaranteed by the elliptical and rounded tuning slides while the metal finger buttons and pearl inlaid provide a comfortable feel and easy playability. With so many other features, once you have handled this trump, you will know it is what you have been looking for.",
                    'price' => 599.75,
                    'in_store' => 11,
                    'instrument_family' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/trmpetq.glb',
                    'preview' => 'images/trmpetq.png',
                    'name' => "Yamaha YTR-8310Z Bobby Shew Custom Series ",
                    'credit_card_number' => base64_encode(5610591081018250),
                    'details' => "The leadpipe of the Yamaha YTR-8310Z Bobby Shew Custom Series Bb Trumpet features a drawn, one-piece, gold brass construction that offers excellent response, intonation and reliable air resistance. The large bore tuning slide and large bell flare enablethis trumpet that has a medium size bore to produce an extremely large sound without exerting much effort.",
                    'price' => 547.99,
                    'in_store' => 7,
                    'instrument_family' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/tuba.glb',
                    'preview' => 'images/tuba.png',
                    'name' => "Jubital JTU1110 Concert Tuba Lacquered",
                    'credit_card_number' => base64_encode(4562599081018250),
                    'details' => "This concert model of the Jubital is also an ideal choice for any musician who is looking forward to own his or her own musical instrument. The Jubital JTU1110 offers you the chance to choose between a model that features rotary valves or piston to suit any need. Displaying a complete selection of valve configurations and sizes, Jubital tubas are known for providing top performance and peace of mind to players at all levels. The lacquers brass body of the Jubital JTU1110 is designed using high-quality technology to produce an instrument of best playability and the most accurate scale.",
                    'price' => 564.99,
                    'in_store' => 7,
                    'instrument_family' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/flglhrn.glb',
                    'preview' => 'images/flglhrn.png',
                    'name' => "Bach FH600 Aristocrat Series Bb Flugelhorn",
                    'credit_card_number' => base64_encode(371410365398431),
                    'details' => "The Bach Aristocrat Bb Flugelhorn offers a two-piece yellow brass bell and .434 bore for outstanding projection. This flugelhorn also features a third slide trigger for easy tuning adjustment.",
                    'price' => 1419.00,
                    'in_store' => 2,
                    'instrument_family' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/piano.glb',
                    'preview' => 'images/piano.png',
                    'name' => "Kawai",
                    'credit_card_number' => base64_encode(371449638521431),
                    'details' => "Kawai is another one of the Japanese piano brands that offers pianos at a reasonable price range. They are durable, well-made pianos with several unique features, including longer keys for increased technical ease and the use of different materials in their construction, like plastic and composite. Their digital pianos were the first to be built with wood keys, offering the experience of an acoustic piano’s keys. Kawai upright pianos and digital pianos are good options for intermediate pianists who want a fairly priced, durable option. Artists playing Kawai pianos include Joe Yamada and Steven Curtis Chapman.",
                    'price' => 7624.35,
                    'in_store' => 7,
                    'instrument_family' => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/piano1.glb',
                    'preview' => 'images/piano1.png',
                    'name' => "Steinway & Sons",
                    'credit_card_number' => base64_encode(3530111333300000),
                    'details' => "Quality and history come together to form Steinway & Sons, a favorite piano maker of many musicians. A German immigrant in New York City started Steinway, and it remains there today. Steinway is a classical pianist’s dream. Many famous pianists endorse the brand including Lang Lang, Mitsuko Uchida, and Martha Argerich. Steinway offers different sizes of grand pianos, which are often selected based on the size of the concert hall they are used in. Due to its long history, you can find many vintage Steinways for sale. Steinway’s grand pianos are their most well-known models, but their price range makes them a better choice for the most dedicated and serious pianists. Luckily, they’ve also created two lines of pianos for those with a more limited budget: the Essex (entry level) and the Boston (mid-level).",
                    'price' => 6478.32,
                    'in_store' => 5,
                    'instrument_family' => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/tabdrm.glb',
                    'preview' => 'images/tabdrm.png',
                    'name' => "Pearl Export",
                    'credit_card_number' => base64_encode(4012888888881881),
                    'details' => "The arrival of the Pearl Export in 1982 set a new benchmark and in 2007 the kit was revived with upgraded shells, new lugs, new tom bracket and a superb hardware package. The new, smaller sculpted lug with a reduced footprint allows the shells to breathe better. The supplied 830 series hardware pack and brushed silver and orange Demonator bass drum pedal are absolutely brilliant for the money. Most budget kits at this price have poplar shells, however Pearl has reintroduced Asian mahogany into the mix and that inner lining of semi-hard red wood adds warmth and depth to the shell tone. The tom heads are Chinese-made transparent Remos and deliver the requisite blam with plenty of depth and authority. As ever with budget kits, the snare is the slightly weak link. It’s lightweight and takes some judicious tuning before it will yield a decent sound. The rest of the kit, however, sounds little different from a kit three times the price.",
                    'price' => 462.89,
                    'in_store' => 3,
                    'instrument_family' => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/maraca.glb',
                    'preview' => 'images/maraca.png',
                    'name' => "Meinl MSM3 Maracas",
                    'credit_card_number' => base64_encode(371412305398431),
                    'details' => "The Meinl MSM3 Maracas is a traditionally size set of maracas that are hand-made and produce a soft sound. Featuring a skin body and wooden handle, these maracas are a worthy addition to any percussion set up.",
                    'price' => 49.60,
                    'in_store' => 2,
                    'instrument_family' => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

                [
                    'id' => \Webpatser\Uuid\Uuid::generate()->string,
                    'object' => 'storage/models/drum.glb',
                    'preview' => 'images/drum.png',
                    'name' => "Fame First Step Bass Drum",
                    'credit_card_number' => base64_encode(371412365398431),
                    'details' => "The Fame First Step Bass Drum is a robust Bass Drum made of mixed wood for beginners. The high-quality drum shells made of mixed wood deliver a clean and balanced sound with a lot of Sustain and sufficient bass. The heads of the Fame First Step drums lie cleanly on the ridges and are easy to tune. The adjustable bass Drum legs have removable spikes, so the Fame First Step Bass Drum promises optimal stability and increased grip while playing the drums. ",
                    'price' => 75.00,
                    'in_store' => 2,
                    'instrument_family' => 2,
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            ]
        );
    }
}
