    <div id="main-menu">
    <nav class="navbar red" role="navigation">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#main-navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

        </div>
        <div class="collapse navbar-collapse" id="main-navbar">
            <ul class="nav navbar-nav main-nav">
                <li><a href="<?php echo site_url(); ?>">Home</a></li>
                <li class="dropdown">
                    <a href="<?php echo site_url('guru-granth-sahib/ang-by-ang'); ?>"
                       class="dropdown-toggle" data-toggle="dropdown">Guru Granth Sahib</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('guru-granth-sahib/introduction'); ?>">Introduction</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('guru-granth-sahib/ang-by-ang'); ?>">Ang by Ang</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('guru-granth-sahib/index/chapter'); ?>">Chapter Index</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('guru-granth-sahib/index/author'); ?>">Author Index</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('guru-granth-sahib/search'); ?>">Search Guru Granth Sahib</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="<?php echo site_url('amrit-keertan/page-by-page'); ?>"
                       class="dropdown-toggle" data-toggle="dropdown">Amrit Keertan</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('amrit-keertan/introduction'); ?>">Introduction</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('amrit-keertan/page-by-page'); ?>">Page by Page</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('amrit-keertan/index/chapter'); ?>">Chapter Index</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('amrit-keertan/index/english'); ?>">English Index</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('amrit-keertan/index/punjabi'); ?>">Punjabi Index</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('amrit-keertan/index/hindi'); ?>">Hindi Index</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('amrit-keertan/search'); ?>">Search Amrit Keertan</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="<?php echo site_url('bhai-gurdas-vaaran/pauri-by-pauri'); ?>"
                       class="dropdown-toggle" data-toggle="dropdown">Bhai Gurdas Vaaran</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('bhai-gurdas-vaaran/introduction'); ?>">Introduction</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('bhai-gurdas-vaaran/pauri-by-pauri'); ?>">Pauri by Pauri</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('bhai-gurdas-vaaran/index/vaar'); ?>">Vaar Index</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('bhai-gurdas-vaaran/search'); ?>">Search Gurdas Vaaran</a></li>
                    </ul>
                </li>
                <li class="dropdown">
                    <a href="<?php echo site_url('dasam-granth/page-by-page'); ?>"
                       class="dropdown-toggle" data-toggle="dropdown">Dasam Granth Sahib</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('dasam-granth/introduction'); ?>">Introduction</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('dasam-granth/index/chapter/en'); ?>">Chapter Index English</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('dasam-granth/index/chapter/pb'); ?>">Chapter Index Punjabi</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('dasam-granth/page-by-page'); ?>">Page by Page</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('dasam-granth/search'); ?>">Search Dasam Granth</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="<?php echo site_url('kabit-savaiye/kabit-by-kabit'); ?>"
                                        class="dropdown-toggle" data-toggle="dropdown">Kabit Savaiye</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('kabit-savaiye/kabit-by-kabit'); ?>">Kabit by Kabit</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('kabit-savaiye/search'); ?>">Search Kabit Savaiye</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="<?php echo site_url('bhai-nand-lal/introduction'); ?>"
                                        class="dropdown-toggle" data-toggle="dropdown">Bhai Nand Lal</a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo site_url('bhai-nand-lal/ghazal'); ?>">Divan-e-Goya : Ghazals</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('bhai-nand-lal/quatrains'); ?>">Rubaayee</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('bhai-nand-lal/zindginama'); ?>">Zindginama</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('bhai-nand-lal/ganjnama'); ?>">Ganjnama</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('bhai-nand-lal/jot-bikas'); ?>">Jot Bikas (Punjabi)</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('bhai-nand-lal/jot-bikas-persian'); ?>">Jot Bikas (Persian)</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('bhai-nand-lal/rahitnama'); ?>">Rahit Nama</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('bhai-nand-lal/tankahnama'); ?>">Tankah Nama</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('bhai-nand-lal/search'); ?>">Search Bhai Nand
                                Lal</a></li>
                    </ul>
                </li>
                <li class="dropdown"><a href="#"
                                        class="dropdown-toggle" data-toggle="dropdown">Baani</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu"><a href="#"
                                                        class="dropdown-toggle" data-toggle="dropdown">Nitnem</a>
                            <ul class="dropdown-menu side-dropdown">
                                <li><a href="<?php echo site_url('baanis/japji-sahib'); ?>">Japji Sahib</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/jaap-sahib'); ?>">Jaap Sahib</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/tvai-prasadh-savaiye'); ?>">
                                        Tvai Prasadh Savaiye</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/chaupai-sahib'); ?>">Chaupai Sahib</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/anand-sahib'); ?>">Anand Sahib</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/rehraas-sahib'); ?>">Rehraas Sahib</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/kirtan-sohila'); ?>">Kirtan Sohila</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu"><a href="#"
                                                        class="dropdown-toggle" data-toggle="dropdown">Guru Granth Sahib</a>
                            <ul class="dropdown-menu side-dropdown">
                                <li><a href="<?php echo site_url('baanis/anand-sahib-bhog'); ?>">Anand Sahib(Bhog)</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/aarti'); ?>">Aarti</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/laavan-anand-karaj'); ?>">
                                        Laavan(Anand Karaj)</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/asa-ki-vaar'); ?>">Asa Ki Vaar</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/sukhmani-sahib'); ?>">Sukhmani Sahib</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/sidh-gosht'); ?>">Sidh Gosht</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/ramkali-sadh'); ?>">Ramkali Sadh</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/dhakanee-oankaar'); ?>">Dhakanee Oankaar</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/baavan-akhree'); ?>">Baavan Akhree</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/shabad-hazare'); ?>">Shabad Hazare</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/baarah-maaha'); ?>">Baarah Maaha</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/sukhmana-sahib'); ?>">Sukhmana sahib</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/dukh-bhanjani-sahib'); ?>">
                                        Dukh Bhanjani Sahib</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/salok-sehskritee'); ?>">Salok Sehskritee</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/gathaa'); ?>">Gathaa</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/phunhay-m5'); ?>">Phunhay M: 5</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/chaubolay-m5'); ?>">Chaubolay M:5</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/salok-kabeer-ji'); ?>">Salok Kabeer ji</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/salok-farid-ji'); ?>">Salok Farid ji</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/savaiye-m1'); ?>">Savaiye M: 1</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/savaiye-m2'); ?>">Savaiye M: 2</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/savaiye-m3'); ?>">Savaiye M: 3</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/savaiye-m4'); ?>">Savaiye M: 4</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/savaiye-m5'); ?>">Savaiye M: 5</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/salok-m9'); ?>">Salok M: 9</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li class="dropdown-submenu"><a href="#"
                                                        class="dropdown-toggle" data-toggle="dropdown">Dasam Granth</a>
                            <ul class="dropdown-menu side-dropdown">
                                <li><a href="<?php echo site_url('baanis/akal-ustati'); ?>">Akal Ustati</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('baanis/bachitar-natak'); ?>">Bachitar Natak</a></li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="dropdown last_li"><a href="#"
                                                class="dropdown-toggle" data-toggle="dropdown">Resources</a>
                    <ul class="dropdown-menu">
                        <li class="dropdown-submenu"><a href="#"
                                                        class="dropdown-toggle" data-toggle="dropdown">Hukumnama</a>
                            <ul class="dropdown-menu side-dropdown">
                                <li><a href="<?php echo site_url('hukumnama'); ?>">Hukumnama Index</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('hukum'); ?>">Sri Darbar Sahib</a></li>
                                <li class="divider"></li>
                                <li><a href="<?php echo site_url('hukumnama/cyber'); ?>">Cyber Hukumnama</a></li>
                            </ul>
                        </li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('sgdv/isg'); ?>">iSearchGurbani</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('sgdv'); ?>">Search Gurbani Desktop Version</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('mahan-kosh'); ?>">GurShabad Ratanakar Mahankosh</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('guru-granth-kosh'); ?>">Sri Guru Granth Kosh</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('sri-nanak-prakash'); ?>">Sri Nanak Prakash</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('sri-gur-pratap-suraj-granth'); ?>">
                                Sri Gur Pratap Suraj Granth</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('faridkot-wala-teeka'); ?>">Faridkot Wala Teeka</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('sri-guru-granth-darpan'); ?>">Sri Guru Granth Darpan</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('maansarovar'); ?>">Maansarovar</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('gurus'); ?>">Guru Sahiban</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('bhagats'); ?>">Bhagat Sahiban</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('bhatts'); ?>">Bhatt Sahiban</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('raags'); ?>">Gurbani Raags</a></li>
                        <li class="divider"></li>
                        <li><a href="<?php echo site_url('unicode'); ?>">Gurbani Fonts</a></li>

                    </ul>
                </li>
            </ul>
        </div>

    </nav>
</div><!-- #main-menu ends -->