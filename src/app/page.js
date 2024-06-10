import circle from "../../public/images/svg/circle.svg";
import Image from "next/image";
import Navbar from '@/libs/Navbar/Navbar';
import Landing from '@/libs/Landing/Landing';
import Services from '@/libs/Services/Services';
import Pricing from '@/libs/Pricing/Pricing';
import Cabinet from '@/libs/Cabinet/Cabinet';
import Testimonials from "@/libs/Testimonials/Testimonials";
import About from '@/libs/About/About'
import Cheque from "@/libs/Cheque/Cheque";
import Contact from "@/libs/Contact/Contact";
import Footer from "@/libs/Footer/Footer";

export default function Home() {
    return (
        <main>
            <div className="main">
                <div className="circle">
                    <Image src={circle} alt=""/>
                </div>
                <Navbar/>
                <Landing/>
            </div>

            <Services/>
            <Pricing/>
            <Cabinet/>
            <Testimonials/>
            <About/>
            <Cheque/>
            <Contact/>
            <Footer/>
        </main>
    );
}
